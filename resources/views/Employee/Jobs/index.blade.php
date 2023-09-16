{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Available Jobs</h1>
                @foreach ($jobs as $job)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">{{ $job->description }}</p>
                            <p class="card-text">{{ $job->requirements }}</p>
                            <p class="card-text">Application Deadline: {{ $job->application_deadline }}</p>
                            <a href="{{ route('employee.jobs.apply', $job) }}" class="btn btn-primary">Apply</a>
                        
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html> --}}


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
		
        @include('emp.partials.style')

		
		
    </head>
	
    <body>
        

        @yield('content')
		<!-- Main Wrapper -->
        
<!-- Main Wrapper -->
<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('emp.partials.nav')


	<!-- Page Wrapper -->
    <div class="page-wrapper ">
        <div class="content container-fluid">
            @if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
			
        <!-- Page Content -->
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Jobs</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                  @foreach ($jobs as $job)
                <div class="col-md-6">
                    <a class="job-list"  href="{{ route('employee.jobs.apply', $job) }}">
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
                @endforeach
            </div>

            
        </div>

    </div>
    <!-- /Page Wrapper -->


    <!-- Page Wrapper -->
    {{-- <div class="page-wrapper ">
    
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
                        <h3 class="page-title">Avalible Jobs</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
               
                <div class="col-md-6">
                   
                </div>


                 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Avalible Jobs</h4>
                        </div>
                        <div class="card-body">
                            {{-- @foreach ($jobs as $job)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $job->title }}</h5>
                                    <p class="card-text">{{ $job->description }}</p>
                                    <p class="card-text">{{ $job->requirements }}</p>
                                    <p class="card-text">Application Deadline: {{ $job->application_deadline }}</p>
                                    <a href="{{ route('employee.jobs.apply', $job) }}" class="btn btn-primary">Apply</a>
                                
                                </div>
                            </div>
                        @endforeach --}}
                        {{-- @foreach ($jobs as $job)
                       
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">{{ $job->title }}</h3>
                                    <h4 class="job-department">{{ $job->description }}</h4>
                                    <h4 class="job-department">{{ $job->requirements }}</h4>
                                </div>
                                <div class="job-type-info">
                                    <a href="{{ route('employee.jobs.apply', $job) }}"><span class="job-types">Full Time</span></a>
                                </div>
                            </div>
                            <div class="job-list-footer">
                                <ul>
                                    <li><i class="fa fa-calendar"></i> Last Date: {{ $job->application_deadline }}<span class="text-blue"></span></li>
                                </ul>
                            </div>
                        
                        @endforeach
                        </div>
                    </div>
                </div>  --}}
            {{-- </div>
            <!-- /Page Header -->
        </div>			
    </div> --}} 
</div>
<!-- /Main Wrapper -->




        @include('emp.partials.script')
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
        		<script>
                    // Function to handle delete action with SweetAlert
                    function handleDelete(id) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'You will not be able to recover this record!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, submit the delete form
                                document.getElementById('deleteForm_' + id).submit();
                            }
                        });
                    }
                </script>
    </body>
</html>