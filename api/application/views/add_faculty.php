<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Add Faculty</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Faculty</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_faculty_save')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
             
              <div class="form-group">
                <label>Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('fa_name');?>" name="fa_name" placeholder="Entrer Name" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Cell Number</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('cell');?>" name="cell" placeholder="Entrer Cell Number" required>
                  </div>
              </div>
			 </div>
			  
			   <div class="col-md-6">
			  <div class="form-group">
                <label>Joining Date</label>
                
                  <div class="col-sm-15">
                    <input type="date" class="form-control" id="inputEmail3" name="join_date" value="<?php echo $this->session->userdata('join_date');?>" placeholder="Joining Date" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Address</label>
                
                  <div class="col-sm-15">
                    <textarea name="address" cols="102" required><?php echo $this->session->userdata('address');?></textarea>
                  </div>
              </div>
			  
			  <div class="box-footer">
				
                <button type="submit" class="btn btn-info">Add</button>
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
