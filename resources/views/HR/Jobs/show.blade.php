
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
        
<!-- Main Wrapper -->
<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('admin.partials.nav')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <div class="content container-fluid">
            @if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title"> All Jobs</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Post New Job</li>
                        </ul>
                    </div>
                </div>
            </div>
  
            <div class="row">
               
              <div class="col-md-6">
                  <a class="job-list"  href="">
                      <div class="job-list-det">
                          <div class="job-list-desc">
                              <h3 class="job-list-title">{{ $job->title }}</h3>
                              <h4 class="job-department">Description:{{ $job->description }}</h4>
                              <h4 class="job-department">Reqiurements:{{ $job->requirements }}</h4>
                          </div>
                          <div class="job-type-info">
                              <span class="job-types"> {{ ucfirst($job->job_type) }}</span>
                          </div>
                      </div>
                      <div class="job-list-footer">
                          <ul>
                              <li><i class="fa fa-calendar"></i> Last Date: {{ $job->application_deadline }}<span class="text-blue"></span></li>
                          </ul>
                      </div>
                  </a>
              </div>
         
          </div>

            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">All Jobs</h4>
                        </div>
                        <div class="card-body">
                            <h1>{{ $job->title }}</h1>
                <p>Description:{{ $job->description }}</p>
                <p>Requirements: {{ $job->requirements }}</p>
                <p>Job Type: {{ ucfirst($job->job_type) }}</p>
                <p>Application Deadline: {{ $job->application_deadline }}</p>
               
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /Page Header -->
            <br>
                             <br>
                             <br>
                             <a href="{{ route('jobs.index') }}">Back to Jobs</a>
           
        
        </div>			
    </div>
    <!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->
        @include('admin.partials.script')
        <script>
            // Function to display SweetAlert success message
            function showSuccessAlert(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: message,
                    showConfirmButton: false,
                    timer: 2000 // 2 seconds
                });
            }
        
            // Function to display SweetAlert error message
            function showErrorAlert(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });
            }
        
            // Check for the presence of success message in the session
            const successMessage = '{{ session('success') }}';
            if (successMessage) {
                showSuccessAlert(successMessage);
            }
        </script>
    </body>
</html>



