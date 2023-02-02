<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Special Coupon</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Special Coupon</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/update_special_discount')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
             <div class="form-group">
                <label>Special Coupon Title</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="Special Coupon Title" required>
                  </div>
              </div>
              <div class="form-group">
                <label>Special Coupon Code</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3"  name="code" placeholder="Special Coupon Code" required>
                  </div>
              </div>
			   
			  <div class="form-group">
                <label>Special Coupon Percentage</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Special Coupon Percentage" required>
                  </div>
              </div>
			 
			  
			 <br>
			    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Add</button>
				
                
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
<script>
$('#type').on('change', function() {
  if(this.value=="date"){
	$('#div2').show();
	$('#div1').hide();
  }else{
	$('#div1').show();
	$('#div2').hide();
  }
});
</script>