<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Oct 2017 07:24:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auto Line Service</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/dist/css/skins/_all-skins.min.css')?>">
<!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/plugins/iCheck/all.css')?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo  base_url('assets/bower_components/select2/dist/css/select2.min.css')?>">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  
  
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
		<script src="<?php echo  base_url('assets/ckeditor/ckeditor.js')?>"></script>
        <script src="<?php echo  base_url('assets/ckeditor/samples/js/sample.js')?>"></script>
		
		
		
		
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo --> 
    <a href="<?php echo  base_url('dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AL</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Auto Line  </b> Service</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
			<!-- Messages: style can be found in dropdown.less-->
			<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo  base_url('assets/dist/img/logo.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Auto Line Service</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo  base_url('assets/dist/img/male-user.jpg')?>" class="img-circle" alt="User Image">

                <p>
                 Auto Line Service
                  <small>Auto Line Service</small>
                </p>
              </li>
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo  base_url('login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
	<?php if($this->session->flashdata('error') != "") : ?>
		<br><br>
		<div class="alert alert-danger" id="error">            
		     <center><?php echo $this->session->flashdata('error'); ?></center>
		</div>						
<?php endif; ?>
<?php if($this->session->flashdata('success') != "") : ?>
<br><br>
	 <div class="alert alert-success" id="success">            
	    <center><?php echo $this->session->flashdata('success'); ?></center>
	</div>						
<?php endif; ?>
  </header>
