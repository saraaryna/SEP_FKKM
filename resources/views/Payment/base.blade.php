
<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="icon" type="image/png" href="/img/classic.png">
	<link href="\css\classic.css" rel="stylesheet">
    

	<title>FKKM</title>

	<style>
		body {
			opacity: 0;
		}

		.wrapper:before
		{
			background:#41968B;
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
			<a class="sidebar-brand"  style="background: #41968B;" href="dashboard">
				<img src="/img/fklogo.png"	 style="height: 30px;">
				FK Kiosk Management
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<span class="d-sm-inline d-none">{{$user->name}}</span>
					<span class="d-sm-inline d-none">{{$user->role}}</span>
				</div>

				<ul class="sidebar-nav">
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/kpPayment">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
								<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
								<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
							  </svg><span class="align-middle">Kiosk Payment</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
        
            
        <main class="content" >
				<div class="container-fluid" >
					<ul class="nav justify-content-end">
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-start" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="/fkBursary-profile">
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
                    @yield('Payment.FKBursaryPayment')
					@yield('Payment.profile')


					</div>

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