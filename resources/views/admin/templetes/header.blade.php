<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>
		<!-- Logo -->
		<a href="index.html" class="logo">
		  <!-- logo-->
		  <div class="logo-lg mt-2">
			  {{-- <span class="light-logo"><img src="{{asset('ed_admin/images/logo-dark-text.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{asset('ed_admin/images/logo-light-text.png')}}" alt="logo"></span> --}}
			  <span class="h3 fw-bolder">{{auth()->user()->name}}</span>
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">

	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">

					</div>
				</div>
			</li>
		  <!-- Notifications -->


	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a>
				 <div class="dropdown-divider"></div>
				 <div class="text-center pb-2">
				 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
					@csrf
					<button class="btn btn-success btn-sm" type="submit">Logout</button>
				</form>
				</div>
				 {{-- <a class="dropdown-item" href="{{route('logout')}}"><i class="ti-lock text-muted me-2"></i> Logout</a> --}}
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->


        </ul>
      </div>
    </nav>
  </header>
