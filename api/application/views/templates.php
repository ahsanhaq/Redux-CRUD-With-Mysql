<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Tempates List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tempates List</h3>

          
        </div>
        <!-- /.box-header -->
		
        <div class="box-body">
          <div class="row">
		   <div class="col-md-12">
			<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>Tempates Title</th>
				<th>Tempates Body</th>
				<th>Tempates Type</th>
				<th>Action</th>
				  
               
            </tr>
        </thead>
        
        <tbody>
            <?php if($tempates){
				foreach($tempates as $tempates){
				?>
			<tr>
			  
                <td><?php echo $tempates->title?></td>
                <td><?php echo $tempates->body?></td>
				<td><?php echo $tempates->type?></td>
                <td>
				<a href="<?php echo base_url()?>dashboard/edit_tempates/<?php echo $tempates->t_id?>"><button class="btn btn-info btn-sm">Edit</button>&nbsp;&nbsp;<a href="<?php echo base_url()?>dashboard/delete_tempates/<?php echo $tempates->t_id?>" onclick="return checkDelete()"><button class="btn btn-danger btn-sm">Delete</button></a></td>
				
				
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