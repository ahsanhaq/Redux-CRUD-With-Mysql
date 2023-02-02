<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Send Email</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Send Email</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/send_email')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
             
              <div class="form-group">
                <label>Template Title</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('title');?>" name="title" placeholder="Entrer Template Title" >
                  </div>
              </div>
			  
			  <div class="form-group">
                <label>Template Body</label>
                <div class="col-sm-15">
                    <textarea id="editor" type="text" class="form-control" name="body" placeholder="Entrer Message Body"></textarea>
                  </div>
                  
              </div>
			 
			   <div class="form-group">
                <label>Users Type</label>
                <div class="col-sm-15">
                    
					<select  class="form-control" name="type">
					<option value="1">Paid Users</option>
					<option value="2">UnPaid Users</option>
					
					</select>
                  </div>
                  
              </div>
			  <div class="box-footer">
				
                <button type="submit" class="btn btn-info">Send</button>
              </div>
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
