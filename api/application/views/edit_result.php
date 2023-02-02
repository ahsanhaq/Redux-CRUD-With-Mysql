<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Edit Result</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Result</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		  
            <form action="<?= base_url('dashboard/add_result_save')?>" method="post" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id?>" name="id">
            <div class="col-md-6">
             
              <div class="form-group">
                <label>Student Name</label>
                
                  <div class="col-sm-15">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $result[0]->student_name;?>" name="student_name" placeholder="Entrer Student Name" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Father CNIC</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" value="<?php echo $result[0]->father_cnic;?>" name="father_cnic" placeholder="Entrer Fater CNIC" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Term</label>
                
                  <div class="col-sm-15">
                     <select class="form-control" name="term">
					<option value="First Term" <?php if($result[0]->term == 'First Term'){echo ' selected="selected"';}?>>First Term</option>
                    <option value="Second Term" <?php if($result[0]->term == 'Second Term'){echo ' selected="selected"';}?>>Second Term</option>	
				    <option value="Third Term"<?php if($result[0]->term == 'Third Term'){echo ' selected="selected"';}?>>Third Term</option>
					<option value="Four Term"<?php if($result[0]->term == 'Four Term'){echo ' selected="selected"';}?>>Four Term</option>
				</select>
                  </div>
              </div>
			  <div class="form-group">
                <label>Sessional</label>
                
                  <div class="col-sm-15">
                     <select class="form-control" name="sessional">
					<option value="First Bi Monthly" <?php if($result[0]->sessional == 'First Bi Monthly'){echo ' selected="selected"';}?>>First Bi Monthly</option>
                    <option value="Second  Bi Monthly" <?php if($result[0]->sessional == 'Second  Bi Monthly'){echo ' selected="selected"';}?>>Second  Bi Monthly</option>	
				    
				</select>
                  </div>
              </div>
			
			  
			  </div>
			  
			   <div class="col-md-6">
			     <div class="form-group">
                <label>Class</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="class"  onchange="get_subcat();">
					<option value="Class One"<?php if($result[0]->class == 'Class One'){echo ' selected="selected"';}?>>Class One</option>
					<option value="Class Two"<?php if($result[0]->class == 'Class Two'){echo ' selected="selected"';}?>>Class Two</option>
					<option value="Class Three"<?php if($result[0]->class == 'Class Three'){echo ' selected="selected"';}?>>Class Three</option>
					<option value="Class Four"<?php if($result[0]->class == 'Class Four'){echo ' selected="selected"';}?>>Class Four</option>
					<option value="Class Five"<?php if($result[0]->class == 'Class Five'){echo ' selected="selected"';}?>>Class Five</option>
					<option value="Class Six"<?php if($result[0]->class == 'Class Six'){echo ' selected="selected"';}?>>Class Six</option>
					<option value="Class Seven"<?php if($result[0]->class == 'Class Seven'){echo ' selected="selected"';}?>>Class Seven</option>
					<option value="Class Eight"<?php if($result[0]->class == 'Class Eight'){echo ' selected="selected"';}?>>Class Eight</option>
					<option value="Class Nine"<?php if($result[0]->class == 'Class Nine'){echo ' selected="selected"';}?>>Class Nine</option>
					<option value="Class Ten"<?php if($result[0]->class == 'Class Ten'){echo ' selected="selected"';}?>>Class Ten</option>
					</select>
                  </div>
              </div>
			   <div class="form-group">
                <label>Course</label>
                
                  <div class="col-sm-15">
                    <select class="form-control" name="course" id="sub">
					<?php foreach($course as $course){?>
					<option value="<?php echo $course['c_name']?>"<?php if($result[0]->course == $course['c_name']){echo ' selected="selected"';}?>><?php echo $course['c_name']?></option>
					<?php }?>
					</select>
                  </div>
              </div>
			  <div class="form-group">
                <label>Marks Obtained</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" name="ob_marks" value="<?php echo $result[0]->ob_marks;?>" placeholder="Entrer Marks Obtained" required>
                  </div>
              </div>
			  <div class="form-group">
                <label>Total Marks</label>
                
                  <div class="col-sm-15">
                    <input type="number" class="form-control" id="inputEmail3" name="total_marks" value="<?php echo $result[0]->total_marks;?>" placeholder="Entrer Total Marks" required>
                  </div>
              </div>
			  <!--<div class="form-group">
                <label>Remarks</label>
                
                  <div class="col-sm-15">
                     <select class="form-control" name="status">
					<option value="1" <?php //if($result[0]->status == '1'){echo ' selected="selected"';}?>>Pass</option>
					<option value="2" <?php //if($result[0]->status == '2'){echo ' selected="selected"';}?>>Fail</option>
					
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