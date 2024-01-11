
<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="icon" type="image/png" href="/img/fklogo.png">
	<link href="\css\classic.css" rel="stylesheet">
    

	<title>FKKM</title>

	<style>
		body {
			opacity: 0;
		}

		.wrapper:before
		{
			background:#66DBE2;
			content:" ";
			height:264px;
			left:0;
			position:absolute;
			top:0;width:100%
			
		}

	


	</style>
	<script src="js/settings.js"></script>
	<script src="js/app.js"></script>
	<!-- END SETTINGS -->
</head>

<body>

    <div class="wrapper" >
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand"  style="background: #66DBE2;" href="dashboard">
				<img src="/img/fklogo.png"	 style="height: 30px;">
				FK Kiosk Management
			</a>
			
			<div class="sidebar-content">
				<div class="sidebar-user">
					<span class="d-sm-inline d-none">Hi, {{$user->userName}}</span><br>
					<span class="d-sm-inline d-none">{{$user->userRole}}</span>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                              </svg> <span class="align-middle">Dashboard</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/admin-manageUser">
							<i class="align-middle me-2" data-feather="user"></i> <span class="align-middle">Manage User</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Admin-appForm">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                              </svg> <span class="align-middle">Kiosk Application</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/adminKiosk">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/>
							  </svg> <span class="align-middle">Manage Kiosk</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		
		
		<div class="main">
			<ul class="nav justify-content-end">
				<li class="nav-item dropdown ms-lg-2">
					<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
						<i class="align-middle fas fa-cog"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="/admin-profile">
							<i class="align-middle me-1 fas fa-fw fa-user"></i> View Profile
						</a>
						<div class="dropdown-divider"></div>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
						<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out
						</a>
					</div>
				</li>
			</ul>
		
			
					{{-- Yield --}}
					@yield('Application.Admin.form')
					@yield('Application.Admin.dashboard')
					@yield('Application.Admin.profile')
					@yield('Application.Admin.user')
		

			</main>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-8 text-start">
						</div>
						<div class="col-4 text-end">
							<p class="mb-0">
								&copy; 2023</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</div>
	

</body>

</html>