{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Assigned Projects</h3>
    @foreach($assignedProjects as $project)
        <div>
            <h4>{{ $project->name }}</h4>
            <p>Deadline: {{ $project->deadline }}</p>
            <p>Progress: {{ $project->progress }}%</p>
            <form action="{{ route('employeeproject.update', $project->id) }}" method="POST">
                @csrf
                <label for="progress">Update Progress:</label>
                <input type="number" name="progress" id="progress" min="0" max="100" value="{{ $project->progress }}">
                <button type="submit">Update</button>
            </form>
            @if ($project->progress >= 100)
                <form action="{{ route('employee.done', $project->id) }}" method="POST">
                    @csrf
                    <button type="submit">Mark as Done</button>
                </form>
            @endif
        </div>
    @endforeach
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
<div class="main-wrapper">
    @include('emp.partials.nav')
    {{-- <!-- Page Wrapper -->
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
                        <h3 class="page-title">Your Assigned Projects</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    @foreach($assignedProjects as $project)
                    <div class="card">
                        <div class="card-body">
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
                                        {{ $project->employee->Firstname }}
                                    </li>
                                </ul>
                            </div>
                      

                            <p class="m-b-5">Progress <span class="text-success float-right"> {{ $project->progress }}%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="{{ $project->progress }}%" style="width: {{ $project->progress }}%"></div>
                            </div>
                            <form action="{{ route('employeeproject.update', $project->id) }}" method="POST">
                                @csrf
                                <label for="progress">Update Progress:</label>
                                <input type="number" name="progress" id="progress" min="0" max="100" value="{{ $project->progress }}">
                                <button type="submit" class="btn  btn-sm btn-primary">Update</button>
                               <br>
                               <br>
       
                            </form>
                            @if ($project->progress >= 100)
                                <form action="{{ route('employee.done', $project->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" >Mark as Done</button>
                                </form>
                            @endif

                            <br>
                            <br>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
               
            </div>





            <!-- /Page Header -->
          
      		
    </div>


</div> --}}


	<!-- Page Wrapper -->
    <div class="page-wrapper">
			
        <!-- Page Content -->
        <div class="content container-fluid">
            @if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		     @endif
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Assigned Project</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
        
            <div class="tab-content">
            
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
              
                    <div class="row">
                        @foreach($assignedProjects as $project)
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $project->name }}</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name" style="color: black; font-size: 17px">{{ $project->description }}</a>
                                                        {{-- <span class="time">Jan 2013 - Present (5 years 2 months)</span> --}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="pro-deadline m-b-15">
                                                        <div class="sub-title"style="color: black; font-size: 17px">
                                                            Deadline:
                                                        </div>
                                                        <div class="text-muted">
                                                            {{ $project->deadline }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content"style="color: black; font-size: 17px">
                                                    <div>Project Leader :</div>
                                                    <ul class="team-members">
                                                        {{-- <li>
                                                            {{ $project->employee->Firstname }}
                                                        </li> --}}
                                                        <li>
                                                            <a href="#" data-toggle="tooltip" title="{{ $project->employee->Firstname }}"><img alt="" src="{{ asset('images/' . $project->employee->avatar) }}">{{ $project->employee->Firstname }}</a>
                                                            {{ $project->employee->Firstname }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <h4 class="m-b-5">Progress <span class="text-success float-right"> {{ $project->progress }}%</span></h4>
                                                    <div class="progress progress-xs mb-0">
                                                        <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="{{ $project->progress }}%" style="width: {{ $project->progress }}%"></div>
                                                    </div>
                                                    <br>
                                                    <form action="{{ route('employeeproject.update', $project->id) }}" method="POST">
                                                        @csrf
                                                        <label for="progress" style="font-size: 17px">Update Progress:</label>
                                                        <input type="number" name="progress" id="progress" min="0" max="100" value="{{ $project->progress }}">
                                                        <button type="submit" class="btn  btn-sm btn-primary">Update</button>
                                                       <br>
                                                       
                               
                                                    </form>
                                                    @if ($project->progress >= 100)
                                                    <form action="{{ route('employee.done', $project->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success" >Mark as Done</button>
                                                    </form>
                                                @endif
                    
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Profile Info Tab -->
        
                
            </div>


        </div>
        <!-- /Page Content -->
        
        
    </div>
    <!-- /Page Wrapper -->



   


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
    </body>
</html>