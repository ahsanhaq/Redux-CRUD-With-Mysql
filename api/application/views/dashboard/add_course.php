<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Add Course</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Course</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_course_save')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
             
              <div class="form-group">
                <label>Course Title</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('c_name');?>" name="c_name" placeholder="Entrer Course Title" required>
                  </div>
              </div>
			  
			  
			  <div class="form-group">
                <label>Class</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="class_n">
					<option value="Class One">Class One</option>
					<option value="Class Two">Class Two</option>
					<option value="Class Three">Class Three</option>
					<option value="Class Four">Class Four</option>
					<option value="Class Five">Class Five</option>
					<option value="Class Six">Class Six</option>
					<option value="Class Seven">Class Seven</option>
					<option value="Class Eight">Class Eight</option>
					<option value="Class Nine">Class Nine</option>
					<option value="Class Ten">Class Ten</option>
					</select>
                  </div>
              </div>
			  
			  </div>
			  
			   <div class="col-md-6">
			 
			  <div class="form-group">
                <label>Class</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="type">
					<option value="Core">Core</option>
					<option value="Non-Core">Non-Core</option>
					
					</select>
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
