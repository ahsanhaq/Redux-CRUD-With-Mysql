<?php include_once('includes/header.php')?>
<?php include_once('includes/links.php')?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
	<section class="content-header">
      <h1>Gallery List</h1>
      
    </section>
	<br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Gallery List</h3>

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
                <th>Event Name</th>
				<th>Event Description</th>
                <th>Event Date</th>
		
				 <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if($album){
				foreach($album as $album){
				?>
			<tr>
                <td><?php echo $album->album_title?></td>
				<td><?php echo substr($album->event_description,0,100);?></td>
                <td><?php echo $album->event_date?></td>
				
                <td><a href="<?php echo base_url()?>dashboard/delete_gallery/<?php echo $album->album_id?>"><button class="btn btn-danger btn-sm">Delete Gallery</button></a></td>
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
