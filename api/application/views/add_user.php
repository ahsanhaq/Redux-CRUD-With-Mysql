<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Add User</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add User</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_user_save')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
             
              <div class="form-group">
                <label>First Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('fname');?>" name="fname" placeholder="Entrer First Name" required>
                  </div>
              </div>
			  
			  <div class="form-group">
                <label>Email</label>
                <div class="col-sm-15">
                    <input type="email" class="form-control" id="inputEmail3" value="" name="user_email" placeholder="Entrer Email" required>
                  </div>
                  
              </div>
			 <div class="form-group">
                <label>Phone</label>
                <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('phone');?>" name="phone" placeholder="Entrer Phone" required>
                  </div>
                  
              </div>
			  
			  <div class="box-footer">
				
                <button type="submit" class="btn btn-info">Add</button>
              </div>
			  </div>
			  
			   <div class="col-md-6">
			   <div class="form-group">
                <label>Last Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('lname');?>" name="lname" placeholder="Entrer Last Name" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Password</label>
                
                  <div class="col-sm-15">
                    <input type="password" class="form-control" id="inputEmail3" name="password" value="" placeholder="Entrer Password" required>
                  </div>
              </div>
			   <div class="form-group">
                <label>Confirm Password</label>
                
                  <div class="col-sm-15">
                    <input type="password" class="form-control" id="inputEmail3" name="con_password" value="<?php echo $this->session->userdata('con_password');?>" placeholder="Entrer Confirm Password" required>
                  </div>
              </div>
			  
			  
			  
              <!-- /.form-group -->
            </div>
			</form>
            <!-- /.col -->
           
            <!-- /.col -->
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
