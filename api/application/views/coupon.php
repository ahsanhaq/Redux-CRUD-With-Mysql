<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Coupon List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Coupon List</h3>

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
                <th>Coupon Name</th>
                <th>Coupon Month</th>
				<th>Coupon Date</th>
				 <th>Coupon Type</th>
				<th>Action</th>
				  
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($coupon){
				foreach($coupon as $coupon){
				?>
			<tr>
                <td><a href="<?php echo base_url()?>dashboard/coupon_user/<?php echo $coupon->coupon_id?>"><?php echo $coupon->coupon_name?></a></td>
                <td><?php echo $coupon->coupon_month?></td>
				<td><?php echo $coupon->coupon_date?></td>
				 <td><?php echo ucfirst($coupon->coupon_type);?></td>
				
				<td>
				<a href="<?php echo base_url()?>dashboard/delete_coupon/<?php echo $coupon->coupon_id?>" onclick="return checkDelete()"><button class="btn btn-danger btn-sm">Delete</button></a></td>
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
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>