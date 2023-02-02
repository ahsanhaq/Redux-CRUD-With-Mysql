<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>All User List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">All User List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		   <div class="col-md-12">
			<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>First Name</th>
				<th>Last Name</th>
                <th>Email</th>
				<th>Package</th>
				
				<th>Valid Date</th>
				<th>Status</th>
				<th>Send Mail</th>
				
				
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($user){
				foreach($user as $user){
				?>
			<tr>
                <td><?php echo $user->firstname?></td>
				<td><?php echo $user->lastname?></td>
                <td><?php echo $user->email?></td>
				 <td><?php if($user->usertype==3){echo "Free";}else{echo "Paid";} ?></td>
				 
				<td><?php  if($user->valid_date){
					echo $user->valid_date;
				}else{
					
					if($user->ride > 0){
						echo $user->ride." Rides";
					}else{
						echo "Expired";
					}
					
					
				}?></td>
				<td><?php if($user->status==0){?>
					<a href="<?php echo base_url()?>dashboard/allstatus/1/<?php echo $user->user_id?>"><button type="button" class="btn btn-danger">InActive</button></a>
					  <?php  }else{?>
					<a href="<?php echo base_url()?>dashboard/allstatus/0/<?php echo $user->user_id?>"><button type="button" class="btn btn-success">Active</button></a>
				<?php } ?></td>
				<td><button class="btn btn-info btn-sm edituser" data-email="<?php echo $user->email?>">Send  Email</button></td>
               
				
            </tr>
			
		
			
				<?php }}?>
          
        </tbody>
    </table>
 
	<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send  Email</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo  base_url('dashboard/send')?>" method="post" enctype="multipart/form-data">
		       
                <input type="hidden" name="email" id="email" class="form-group">
                
			    <div class="col-lg-12 form-group">
                            <label for="fname">Title<span style="color:red">*</span></label>
                            <div>
                                <input id="title" name="title" maxlength="30" type="text"
                                    class="form-control">
                               
								<label id="title-error" class="error" style="display:none">This field is required.</label>
                            </div>
                </div>
				 <div class="form-group">
                <label>Message Body</label>
                <div class="col-sm-15">
                    <textarea id="editor" type="text" class="form-control" name="body" placeholder="Entrer Message Body"></textarea>
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
$(document).on('click','.edituser',function(){
		  
		  var email=$(this).attr("data-email");
		  $('#email').val(email);
		  
		  $('#myModals').modal('show');
           		  
});
</script>
