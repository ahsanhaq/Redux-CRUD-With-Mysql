<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Add Gallery</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Gallery</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_gallery_save')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
             
              <div class="form-group">
                <label>Entrer Event Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" name="album_title" placeholder="Entrer Event Name" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Upload Image</label>
                
                 
                    <div class="col-sm-12">
						<div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control form-control-line" data-trigger="fileinput">
							<i class="glyphicon glyphicon-picture fileinput-exists"></i>
							<span class="fileinput-filename"></span></div>
							<span class="input-group-addon btn btn-default btn-file">
							<span class="fileinput-new">Select file</span>
							<span class="fileinput-exists">Change</span>
							<input type="file" name="album_photo[]" multiple></span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
				
              </div>
			  <div class="form-group">
                <label>Event Date</label>
                
                  <div class="col-sm-15">
                    <input type="date" class="form-control" id="inputEmail3" name="event_date" required>
                  </div>
              </div>
			  
			  <div class="form-group">
                <label>Event Description</label>
                
                  <div class="col-sm-15">
                    <textarea name="event_description" cols="65" required></textarea>
                  </div>
              </div>
			  <br>
			  
			  
			  
			  
			  
			  
			   
			    <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Add</button>
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
