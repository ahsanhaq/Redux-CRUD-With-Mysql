<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Add Result</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Result</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_result_save')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
             
              <div class="form-group">
                <label>Student Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('student_name');?>" name="student_name" placeholder="Entrer Student Name" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Father CNIC</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata('father_cnic');?>" name="father_cnic" placeholder="Entrer Fater CNIC" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Term</label>
                
                  <div class="col-sm-15">
                     <select class="form-control" name="term">
					<option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>	
				    <option value="Third Term">Third Term</option>
					<option value="Four Term">Four Term</option>
				</select>
                  </div>
              </div>
			  
			  <div class="form-group">
                <label>Sessional</label>
                
                  <div class="col-sm-15">
                     <select class="form-control" name="sessional">
					<option value="1">First Bi Monthly</option>
                    <option value="2">Second  Bi Monthly</option>	
				    
				</select>
                  </div>
              </div>
			  
			  
			  </div>
			  
			   <div class="col-md-6">
			    <div class="form-group">
                <label>Class</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="class" onchange="get_subcat();">
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
			  
			  <div class="form-group">
                <label>Course</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="course" id="sub">
					<?php foreach($course as $course){?>
					<option value="<?php echo $course['c_name']?>"><?php echo $course['c_name']?></option>
					<?php }?>
					</select>
                  </div>
              </div>
			  <div class="form-group">
                <label>Marks Obtained</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" name="ob_marks" value="<?php echo $this->session->userdata('ob_marks');?>" placeholder="Entrer Marks Obtained" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Total Marks</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" name="total_marks" value="<?php echo $this->session->userdata('total_marks');?>" placeholder="Entrer Total Marks" required>
                  </div>
              </div>
			<!--<div class="form-group">
                <label>Remarks</label>
                
                  <div class="col-sm-15">
                     <select class="form-control" name="status">
					<option value="1">Pass</option>
					<option value="2">Fail</option>
					
					</select>
                  </div>
              </div>-->
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
<script>
function get_subcat(){
	var a=$('select[name=class]').val();
    var cat_id = a;
  $.post('<?php echo base_url();?>dashboard/get_course', {'class' : cat_id}, function(data) {
	   $( "#sub" ).html(data);   
        
	});
}
</script>