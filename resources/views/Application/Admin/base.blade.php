
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
						<a class="sidebar-link" href="/payment-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
								<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
								<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
							  </svg><span class="align-middle">Kiosk Payment</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/complaint-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg><span class="align-middle">Kiosk Complaint</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/sales-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
								<path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
								<path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
								<path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
							  </svg><span class="align-middle">Kiosk Sales</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/kiosk-admin">
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