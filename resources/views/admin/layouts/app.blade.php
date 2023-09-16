<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard - HR Management</title>
		
        @include('admin.partials.style')

		
		
    </head>
	
    <body>
        @yield('content')
		<!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- Loader -->
			<div id="loader-wrapper">
				<div id="loader">
					<div class="loader-ellips">
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					</div>
				</div>
			</div>
			<!-- /Loader -->
            <div class="page-wrapper">
        @include('admin.partials.nav')
        
		
				
        
       
           @include('admin.partials.welcomeadmin')
			
			
        </div>
		<!-- /Main Wrapper -->
        </div>
		
        @include('admin.partials.script')
    </body>
</html>