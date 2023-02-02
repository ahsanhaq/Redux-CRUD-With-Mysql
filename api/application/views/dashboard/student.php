<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Student List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Student List</h3>

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
                 <th>Name</th>
                 <th>Father Name</th>
				 <th>Father CNIC</th>
				 <th>Address</th>
				 <th>Class</th>
				 <th>Cell</th>
				 <th>Date Of Birth</th>
				  <th>Action</th>
				  
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($student){
				foreach($student as $result){
				?>
			<tr>
                <td><?php echo $result->s_name?></td>
                <td><?php echo $result->f_name?></td>
				 <td><?php echo $result->f_cnic?></td>
                <td><?php echo $result->address?></td>
				<td><?php echo $result->s_class	;?></td>
				<td><?php echo $result->cell?></td>
				 <td><?php echo $result->dob?></td>
                
				<td><a href="<?php echo base_url()?>dashboard/edit_student/<?php echo $result->s_id?>"><button class="btn btn-info btn-sm">Edit</button></a>&nbsp;<a href="<?php echo base_url()?>dashboard/delete_student/<?php echo $result->s_id?>"><button class="btn btn-danger btn-sm">Delete</button></a></td>
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
