<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
		<div class="sidebar-brand-icon">
			<i class="fas fa-user-circle"></i>
		</div>
		<div class="sidebar-brand-text mx-3">User</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<!-- Nav Item - Dashboard -->
	<li class="nav-item @if(Request::is('user/dashboard')){{ 'active' }}@endif">
		<a class="nav-link" href="{{ route('user.dashboard') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item @if(Request::is('user/blogs*')) {{ 'active' }} @endif">
		<a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
			<i class="fas fa fa-user"></i>
			<span>Blogs</span>
		</a>
		<div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item @if(Request::is('user/blogs')){{ 'active' }}@endif" href="{{ route('user.blogs.index') }}">List Blogs</a>
				<a class="collapse-item @if(Request::is('user/blogs/create')){{ 'active' }}@endif" href="{{ route('user.blogs.create') }}">Add Blog</a>
			</div>
		</div>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>