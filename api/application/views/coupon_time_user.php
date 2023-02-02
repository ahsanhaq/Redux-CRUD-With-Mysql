<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Coupon Users List</h1>
	  			<div class="container">
   <form method="post"  action="<?php echo base_url();?>dashboard/searchrecord" autocomplete="off" id="myForm" enctype="multipart/form-data">
      
    <div class="row">
	               
      <div class="col-md-3">
        <div class="form-group">
          <label for="first">Start Date</label>
          <input type="date" class="form-control" placeholder="" id="sdate" name="sdate" value="<?php echo @$sdate;?>">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-3">
        <div class="form-group">
          <label for="last">End Date</label>
          <input type="date" class="form-control" placeholder="" id="edate" name="edate" value="<?php echo @$edate;?>">
        </div>
      </div>
	   <div class="col-md-4">
        <div class="form-group">
          <label for="last">Coupon Name</label>
         <select id="sstatus" name="coupon" class="form-control" placeholder="Select Participants">
		  <option value="">Select Coupon</option>
							  <?php if($coupons){
				foreach($coupons as $coupons){
				?>
		  <option value="<?php echo $coupons->coupon_id; ?>" <?php if($coupons->coupon_id==@$selected){echo 'selected';} ?>><?php echo $coupons->coupon_name; ?></option>
		  <?php } } ?>
         </select>
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
	    
	   
	 
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Coupon Users List</h3>

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
          <th>Coupon Name</th>
		  <th>First Name</th>
          <th>Start Date</th>
          <th>End Date</th>	
          <th>Minutes</th>			  
			 </tr>
        </thead>
        
        <tbody>
            <?php if($coupon){
				foreach($coupon as $user){
				?>
			<tr>
                <td><?php echo $user->coupon_name;?></td>
				<td><a class="user" data-id="<?php echo $user->user_id;?>" data-coupon="<?php echo $user->c_id;?>"><?php echo $user->firstname." ".$user->lastname;?></a></td>
                <td><?php echo $user->t_start?></td>
                <td><?php echo $user->e_time?></td> 
				<td><?php echo $user->getmin?></td> 
                
				
            </tr>
			
			
			
				<?php }?>
          
        </tbody>
		<tfoot>
								<tr>
									
										<th colspan="5" style="text-align:right">Total:<?php echo $min;?></th>
										
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


	<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login History</h4>
      </div>
      <div class="modal-body">
     
	<div class="">
          
  <table class="table table-bordered">
    <thead>
      <tr>
       <th>Coupon Name</th>
		  <th>Start Date</th>
          <th>End Date</th>	
          <th>Minutes</th>		
      </tr>
    </thead>
    <tbody id="main">
      
    </tbody>
  </table>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>	
<?php include_once('includes/footer.php'); ?>

<script>

	$(document).ready(function () {  
		//$('.user').on("click",function(){
			 $(document).on("click",".user",function() {
			var id=$(this).data("id");
			var coupon=$(this).data("coupon");
			if(id){
				$.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>dashboard/getuserhistory/',
                    data: {'user_id': id,'coupon':coupon},
                    success: function (data) {
                            var obj = JSON.parse(data);
					
					        if (obj.Success == '200') {
								var List = "";
								$("#main").html("");
								 $.each(obj.record, function(index,e) {
									List = List + '<tr><td>'+e.coupon_name+'</td><td>'+e.t_start+'</td><td>'+e.e_time+'</td><td>'+e.minutes+'</td></tr>';
								});
								$("#main").append(List);
								 $('#myModals').modal('show');
							}else{
								alert(obj.message);
								 return false;
							}
						},
                    
              });
				
			}else{
				return false;
			}
			
			
			
			
		});	
	});			

	</script>
	
