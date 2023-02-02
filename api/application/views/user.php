<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>User Listssssss</h1>
      
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
                        <th></th>
                        <th>Username</th>
				        <th>Email</th>
				        <th>phone</th>
				        <th>Cnic</th>
				        
				        <th>User Type</th>
				        <th>License</th>
                        <th>Status</th>
				        <th>Action</th>
				        
            </tr>
        </thead>
        
        <tbody >
            <?php if($user){
				foreach($user as $user){
				?>
			<tr>
                <td><img src='<?php echo base_url()."assets/user_images/".$user->pic?>' width='50px' height='50px'/></td>
				<td><?php echo $user->username?></td>
				<td><?php echo $user->email?></td>
				<td><?php echo $user->phone?></td>
				<td><?php echo $user->cnic?></td>
               
				<td><?php echo $user->type?></td>
				<td>
				<?php if($user->license==''){
					echo "NA";
				}else{
					echo $user->license;
				}
				?>
				</td>
				        
                <td>
				<?php if($user->status==0){?>
					<a href="<?php echo base_url()?>dashboard/status/1/<?php echo $user->user_id?>"><button type="button" class="btn btn-danger">InActive</button></a>
					  <?php  }else{?>
					<a href="<?php echo base_url()?>dashboard/status/0/<?php echo $user->user_id?>"><button type="button" class="btn btn-success">Active</button></a>
				<?php } ?>
				</td>	
				
				
				<td>
				<a href="<?php echo base_url()?>dashboard/delete_user/<?php echo $user->user_id?>" onclick="return checkDelete()"><button class="btn btn-danger btn-sm">Delete</button></a></td>
       
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