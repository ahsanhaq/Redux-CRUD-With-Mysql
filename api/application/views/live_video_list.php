<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Live video</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Event List</h3>

          
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		   <div class="col-md-12">
			<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>Name</th>
				<th>Event Date</th>
				<th>Link</th>
				<th>Action</th>
				
				  
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($live_video){
				foreach($live_video as $lives){
				?>
			<tr>
			  
                <td><?php echo $lives->name?></td>
                <td><?php echo $lives->video_date." ".$lives->timezone?></td>
				<td><a href="<?php echo $lives->link?>">Link</a></td>
                <td>
				<a href="<?php echo base_url()?>dashboard/delete_live_video/<?php echo $lives->id?>" onclick="return checkDelete()"><button class="btn btn-danger btn-sm">Delete</button></a></td>
				
				
            </tr>
			
			
			
		
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