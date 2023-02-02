<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>User List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">User List</h3>

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
				 <th>User Role</th>
				 <th>Number</th>
				 <th>Action</th>
				  
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($user){
				foreach($user as $user){
				?>
			<tr>
                <td><?php echo $user->fname?></td>
                <td><?php echo $user->lname?></td>
				 <td><?php echo $user->email?></td>
                <td><?php 
				if($user->user_role==0){
				     echo "Super Admin";
				}else{
				   echo "Oprator";
				}?>
				
				</td>
				 <td><?php echo $user->num?></td>
              
               
				
                <td><a href="<?php echo base_url()?>dashboard/delete_user/<?php echo $user->user_id?>"><button class="btn btn-danger btn-sm">Delete</button></a></td>
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
