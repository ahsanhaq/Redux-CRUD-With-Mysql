<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
<div class="container">
   <form method="post"  action="<?php echo base_url();?>dashboard/searchfreeUsers" autocomplete="off" id="myForm" enctype="multipart/form-data">
      
    <div class="row">
	               
      <div class="col-md-5">
        <div class="form-group">
          <label for="first">Start Date</label>
          <input type="date" class="form-control" placeholder="" id="sdate" name="sdate" value="<?php echo @$sdate;?>">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-5">
        <div class="form-group">
          <label for="last">End Date</label>
          <input type="date" class="form-control" placeholder="" id="edate" name="edate" value="<?php echo @$edate;?>">
        </div>
      </div>
	   
	  
	   <div class="col-md-2">
        <div class="form-group">
         <button type="submit" class="btn btn-success" style="margin: 25px 0 0 0;padding: 5px 10px;">Submit</button>
		
        </div>
      </div>
      <!--  col-md-6   -->
    </div>


  


  </form>
</div>
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Users List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		   <div class="col-md-12">
			<table id="example1" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
          <th>First Name</th>
		  <th>Last Name</th>
		  		    <th>Email</th>
					<th>Created Date</th>
			 </tr>
        </thead>
        
        <tbody>
            <?php if($user){
				foreach($user as $users){
				?>
			<tr>
                <td><?php echo $users->firstname; ?></td>
				<td><?php echo $users->lastname;?></td>
				<td><?php echo $users->email;?></td>
				<td><?php echo $users->user_created_date;?></td>
				
                
				
            </tr>
			
			
			
				<?php }?>
          
        </tbody>
		<tfoot>
								<tr>
									
										<th colspan="4" style="text-align:right">Total:<?php echo count($user);?></th>
										
								</tr>
							</tfoot>
								<?php }?>
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

