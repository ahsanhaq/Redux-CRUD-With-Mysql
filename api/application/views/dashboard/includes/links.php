<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			  <img src="<?php echo  base_url('assets/dist/img/rbc-logo.png')?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			  <p>GEM International School</p>
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
					<span>Gallery Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/gallery')?>"><i class="fa fa-list"></i>All Gallery</a></li>						
					<li><a href="<?php echo  base_url('dashboard/add_gallery')?>"><i class="fa fa-briefcase"></i>Add Gallery</a></li>
				</ul>
			</li>
			
			
			
			<li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Result Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/result')?>"><i class="fa fa-users"></i>Result List</a></li>
					<li><a href="<?php echo  base_url('dashboard/add_result')?>"><i class="fa fa-users"></i>Add Result</a></li>
				</ul>
			</li>
			<?php if($this->session->userdata("user_role")=="0")
		      {?>
		  
		  <li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Faculty Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/faculty')?>"><i class="fa fa-users"></i>Faculty List</a></li>
					<li><a href="<?php echo  base_url('dashboard/add_faculty')?>"><i class="fa fa-users"></i>Add Faculty</a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Student Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/student')?>"><i class="fa fa-users"></i>Student List</a></li>
					<li><a href="<?php echo  base_url('dashboard/add_student')?>"><i class="fa fa-users"></i>Add Student</a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Course Managment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo  base_url('dashboard/course')?>"><i class="fa fa-users"></i>Course List</a></li>
					<li><a href="<?php echo  base_url('dashboard/add_course')?>"><i class="fa fa-users"></i>Add Course</a></li>
				</ul>
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
					<li><a href="<?php echo  base_url('dashboard/add_user')?>"><i class="fa fa-users"></i>Add User</a></li>
				</ul>
			</li>
			<?php } ?>
			
			
			
			
			
		</ul>
		
    </section>
    <!-- /.sidebar -->
</aside>
