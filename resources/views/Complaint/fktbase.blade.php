<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" type="image/png" href="">
	<link href="\css\classic.css" rel="stylesheet">
    

	<title>FKKM</title>

	<style>
		body {
			opacity: 0;
		}

		.wrapper:before
		{
			background:#1D72A3;
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
			<a class="sidebar-brand"  style="background: #1D72A3;" href="dashboard">
				<img src=""	 style="height: 50px;">
				FK Kiosk Management
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					{{-- <small>{{ "ID:  " . Auth::guard('account')->user()->A_icNum }}</small><br>
					<small>{{ "Nama:  " . Auth::guard('account')->user()->A_name }}</small> --}}
				</div>

				<ul class="sidebar-nav">
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/complaint-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                              </svg> <span class="align-middle">Kiosk Complaint</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
        
            
        <main class="content" >
				<div class="container-fluid" >

					{{-- Yield --}}
                    @yield('Complaint.fktComplaint')


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