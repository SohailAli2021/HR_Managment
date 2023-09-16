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
                        <h3 class="page-title">Project Details</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project Details</li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown dropdown-action profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.editAssign', $project->id) }}"  data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                  
                                </div>
                            </div>
                            <h4 class="project-title"><a href=""> {{ $project->name }}</a></h4>
                            <p class="text-muted">{{ $project->description }}
                            </p>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Deadline:
                                </div>
                                <div class="text-muted">
                                    {{ $project->deadline }}
                                </div>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Project Leader :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="{{ $project->employee->Firstname }}"><img alt="" src="{{ asset('images/' . $project->employee->avatar) }}">{{ $project->employee->Firstname }}</a>
                                        {{ $project->employee->Firstname }}
                                    </li>
                                </ul>
                            </div>
                      

                            <p class="m-b-5">Progress <span class="text-success float-right"> {{ $project->progress }}%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: {{ $project->progress }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Project Details</h4>
                        </div>
                        <div class="card-body">
                            
                            <ul class="list-group">
                             
                                 <h4>{{ $project->name }}</h4>
        <p>Assigned to: {{ $project->employee->Firstname }}</p>
        <p>Name: {{ $project->name }}</p>
        <p>Deadline: {{ $project->deadline }}</p>
        <p>Progress: {{ $project->progress }}%</p> 
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                       
                            <a href="{{ route('admin.editAssign', $project->id) }}"class="btn  btn-primary mr-2">Edit</a>
                       
                    </li>
              
            </ul>
                           
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /Page Header -->
            <br>
                             {{-- <br>
                             <br>
                             <a href="{{ route('jobs.index') }}">Back to Jobs</a> --}}
           
        
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



