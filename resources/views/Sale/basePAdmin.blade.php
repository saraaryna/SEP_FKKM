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
			background:#318099;
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
			<a class="sidebar-brand"  style="background: #318099;" href="dashboard">
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
						<a class="sidebar-link" href="padmin">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                              </svg> <span class="align-middle">Dashboard</span>
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