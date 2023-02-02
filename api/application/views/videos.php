<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Videos List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Videos List</h3>

          <div class="box-tools pull-right">
            <a href="<?php echo base_url()?>dashboard/get_videos"><button type="button" class="btn btn-info">Refresh Videos List</button></a>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		   <div class="col-md-12">
			<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Video Thumbnail</th>
                <th>Video Title</th>
				 <th>Video Duration</th>
				 <th>Video Likes</th>
				 <th>Paid/Unpaid/Theme Ride</th>
				 <th>Status</th>
				 
				 <th>Type</th>
				 <th>Delete</th>
				
				  
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($videos){
				foreach($videos as $videos){
				?>
			<tr>
			    <td><img src="<?php echo $videos->video_pictures?>" width="50px" height="50px"></td>
                <td><?php echo $videos->video_name?></td>
                <td><?php echo $videos->video_duration?></td>
				<td><?php echo $videos->video_likes?></td>
				 <td>
					<?php if($videos->paid==0){
					           echo "Paid";
					    }elseif($videos->paid==1){
					       echo "Unpaid";
						 }elseif($videos->paid==2){
					       echo "Theme Ride Paid";
						 }elseif($videos->paid==4){
					       echo "Beginners/Instructional";
						 }else{
							echo "Theme Ride Free";
						} ?>
				</td>
                <td>
					<?php if($videos->status==0){?>
					<a href="<?php echo base_url()?>dashboard/videostatus/1/<?php echo $videos->video_id?>"><button type="button" class="btn btn-danger">InActive</button></a>
					  <?php  }else{?>
					<a href="<?php echo base_url()?>dashboard/videostatus/0/<?php echo $videos->video_id?>"><button type="button" class="btn btn-success">Active</button></a>
				<?php } ?>
				</td>	
				
				
				<td>
				<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $videos->video_id?>">Add Type</button>
				</td>
				<td><a href="<?php echo base_url()?>dashboard/delete_video/<?php echo $videos->video_id?>" onclick="return checkDelete()"><button class="btn btn-danger btn-sm">Delete</button></a></td>
            </tr>
			
<div id="myModal<?php echo $videos->video_id?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Type</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo  base_url('dashboard/paid')?>" method="post" enctype="multipart/form-data">
		       <div class="form-group">
                <label>Type</label>
                
                  <div class="col-sm-15">
				  
                    <select  class="form-control" name="type">
					<option value="0"<?php if($videos->paid == '0'){echo ' selected="selected"';}?>>Paid</option>
					<option value="1"<?php if($videos->paid == '1'){echo ' selected="selected"';}?>>UnPaid</option>
					<option value="2"<?php if($videos->paid == '2'){echo ' selected="selected"';}?>>Theme Ride Paid</option>
					<option value="3"<?php if($videos->paid == '3'){echo ' selected="selected"';}?>>Theme Ride Free</option>
					<option value="4"<?php if($videos->paid == '4'){echo ' selected="selected"';}?>>Beginners/Instructional</option>
					</select>
					<input type="hidden" value="<?php echo $videos->video_id ?>" name="video_id">
                  </div>
              </div>
			  
			  <button type="submit" class="btn btn-info">Add</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>				
			
		
				<?php }}?>
          
        </tbody>
    </table>
 
			 
			  
              
            </div>
			</div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->

     
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once('includes/footer.php'); ?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>