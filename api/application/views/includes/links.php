<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			  <img src="<?php echo  base_url('assets/dist/img/logo.png')?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			  <p>Auto Line Service</p>
			  <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
			</div>
		</div>
      <!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
        
			<li class="active treeview menu-open">
			  <a href="<?php echo  base_url('dashboard')?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				<span class="pull-right-container">
				</span>
			  </a>
			</li>
        
			
			
			
			
			
			
		  
			<li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>User Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/users')?>"><i class="fa fa-users"></i>User List</a></li>
					
				</ul>
			</li>
			
			<li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Rides Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/rides')?>"><i class="fa fa-users"></i>Rides List</a></li>
					
				</ul>
			</li>
			
			<li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Contact Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/contact')?>"><i class="fa fa-users"></i>Contact List</a></li>
					
				</ul>
			</li>
			
			
			
			
			
			
			
			
			
		</ul>
		
    </section>
    <!-- /.sidebar -->
</aside>
