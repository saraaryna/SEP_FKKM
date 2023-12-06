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
			background:#30C9B7;
			content:" ";
			height:264px;
			left:0;
			position:absolute;
			top:0;width:100%
		}

		.wrapper 
		{
			position: relative;
		}

		.sign-out 
		{
			position: absolute;
			top: 20px; /* Adjust the top position as needed */
			right: 20px; /* Adjust the right position as needed */
		}

		
		.sign-out-link 
		{
			text-decoration: none; /* Remove underline */
			color: #000; /* Set color */
			border: none; /* Remove border */
			outline: none; /* Remove outline */
		}

	</style>
	<script src="js/settings.js"></script>
	<script src="js/app.js"></script>
	<!-- END SETTINGS -->
</head>

<body>

    <div class="wrapper" >
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand"  style="background: #30C9B7;" href="dashboard">
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
						<a class="sidebar-link" href="/dashboard-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                              </svg> <span class="align-middle">Dashboard</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/application-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                              </svg> <span class="align-middle">Kiosk Application</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/payment-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-heart" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5ZM1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3Zm2 .5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V4a.5.5 0 0 0-.5-.5H3Zm5 4.493c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                              </svg> <span class="align-middle">Kiosk Payment</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/complaint-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                              </svg> <span class="align-middle">Kiosk Complaint</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="/sales-admin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                              </svg><span class="align-middle">Kiosk Sales</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
        
            
        <main class="content" >
				<div class="container-fluid" >

					{{-- Yield --}}
                    @yield('contents')


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

			<!-- Right-aligned Sign Out link -->
            <div class="sign-out">  
                <a class="sidebar-link sign-out-link" href="/logout">
                    <svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 7.5L10.5 10.75M13.5 7.5L10.5 4.5M13.5 7.5L4 7.5M8 13.5H1.5L1.5 1.5L8 1.5" stroke="#000000"/>
                    </svg><span class="align-middle">Sign Out</span>
                 </a>
            </div>
		</div>

	</div>
	

</body>

</html>