<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li class="header">Dashboard</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('admin.dashboard','dashboard')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					<span>Category</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('admin.category')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manage Category</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i class="fa-solid fa-user"></i>
					<span>Author</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('author')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manage Author</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i class="fa-solid fa-newspaper"></i>
					<span>Article</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('admin.article')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manage Article</a></li>
					<li><a href="{{route('admin.article-content')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manage Article Content</a></li>
				  </ul>
				</li>
			  </ul>
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
			@csrf
			<button class="btn btn-success btn-sm mt-2" type="submit">Logout</button>
		</form>
	</div>
  </aside>
