<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Free User List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Free User List</h3>

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
        <!-- <th>Last Name</th>
         <th>Full Name</th>-->       
				 <th>Email</th>
				 <th>City</th>
				        <th>State</th>
				        <th>Country</th>
				 <!--<th>Country</th>-->
				 <th>Extend Date</th>
				 <th>Action</th>
				  <th>Date SignUp</th>
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($user){
				foreach($user as $user){
				?>
			<tr>
                <td><?php echo $user->firstname?></td>
                <!--<td><?php echo $user->lname?></td>
                <td><?php echo $user->fullname?></td> -->
                <td><?php echo $user->email?></td>
				<td><?php echo $user->city?></td>
                <td><?php echo $user->state?></td>
				<td><?php echo $user->country?></td>
				<td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModals<?php echo $user->user_id?>">Extend Date</button></td>
                <!--<td><?php echo $user->country?></td>
				        <td><?php echo $user->state?></td>-->
				 <td>
				<a href="<?php echo base_url()?>dashboard/delete_freeuser/<?php echo $user->user_id?>" onclick="return checkDelete()"><button class="btn btn-danger btn-sm">Delete</button></a></td>
				<td><?php echo $user->user_created_date?></td>
				
            </tr>
			
<div id="myModals<?php echo $user->user_id?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Discount</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo  base_url('dashboard/extend_dates')?>" method="post" enctype="multipart/form-data">
		       <div class="form-group">
                <label>Date</label>
                
                  <div class="col-sm-15">
				  
                    <input type="date" class="form-control" id="date" min="<?php echo date('Y-m-d',strtotime($user->valid_date)); ?>" value="<?php echo date('Y-m-d',strtotime($user->valid_date)); ?>" name="date" placeholder="Extend User Package Date" required>
					<input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">
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
