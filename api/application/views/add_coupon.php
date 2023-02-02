<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Add Coupon</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Coupon</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_coupon_save')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
             
              <div class="form-group">
                <label>Coupon Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="Coupon Name" required>
                  </div>
              </div>
			   <div class="form-group">
                <label>Coupon Type</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="type" id="type">
					<option value="month">Monthly</option>
					<option value="date">Date</option>
					
					
					</select>
                  </div>
              </div>
			  <div class="form-group" id="div1">
                <label>Coupon Month</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="month">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					
					</select>
                  </div>
              </div>
			  <div class="form-group" id="div2" style="display:none">
                <label>Coupon Date</label>
                
                  <div class="col-sm-15">
                    <input class="form-control" name="date" type="date">
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