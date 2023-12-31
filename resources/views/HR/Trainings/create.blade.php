{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="create-training">
        <h2>Create Training Session</h2>
        <form action="{{ route('trainings.store') }}" method="POST">
            @csrf
            <label for="training_type_id">Select Training Type:</label>
            <select name="training_type_id" id="training_type_id">
                @foreach ($trainingTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select>

            

            <label for="trainer_id">Select Trainer:</label>
            <select name="trainer_id" id="trainer_id">
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->employee->Firstname }}</option>
                @endforeach
            </select>

            <h3>Select Employees:</h3>
            @foreach ($employees as $employee)
                <label>
                    <input type="checkbox" name="selected_employees[]" value="{{ $employee->id }}" class="employee-checkbox">
                    {{ $employee->Firstname }}
                </label>
                <br>
            @endforeach

            <label for="num_of_employees">Number of Employees:</label>
            <input type="number" name="num_of_employees" id="num_of_employees" min="1" readonly>

            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

            <button type="submit">Create Training</button>
        </form>

        <script>
            const checkboxes = document.querySelectorAll('.employee-checkbox');
            const numOfEmployeesInput = document.getElementById('num_of_employees');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selectedCheckboxes = document.querySelectorAll('.employee-checkbox:checked');
                    numOfEmployeesInput.value = selectedCheckboxes.length;
                });
            });
        </script>
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
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Add Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                            <li class="breadcrumb-item active">Add Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">New Employee</h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('trainings.store') }}" method="POST">
                                @csrf

                       <div class="form-group row">
                                <label class="col-form-label col-md-2" for="training_type_id">Select Training Type<span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                <select name="training_type_id" id="training_type_id">
                                    @foreach ($trainingTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                           </div>
                       </div>


                         <div class="form-group row">
                                <label for="trainer_id" class="col-form-label col-md-2">Select Trainer<span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                <select name="trainer_id" id="trainer_id">
                                    @foreach ($trainers as $trainer)
                                        <option value="{{ $trainer->id }}">{{ $trainer->employee->Firstname }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>

                            <label >Select Employees<span class="text-danger">*</span></label>
                     <div class="col-md-10">
                            @foreach ($employees as $employee)
                                <label>
                                    <input type="checkbox" name="selected_employees[]" value="{{ $employee->id }}" class="employee-checkbox">
                                    {{ $employee->Firstname }}
                                </label>
                                <br>
                            @endforeach
                     </div>

                                <label for="num_of_employees">Number of Employees:</label>
                                <input type="number" name="num_of_employees" id="num_of_employees" min="1" readonly>
                            <br>
                            <br>
                            

                               <div class="form-group row">
                                    <label  for="status" class="col-form-label col-md-2">Status<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="status" id="status" class="form-control">
                                        <option value="">------------Select Status-----------</option>
                                           <option value="active">Active</option>
                                           <option value="inactive">Inactive</option>
                                           <option value="inprogress">In Progress</option>
                                           <option value="completed">Completed</option>
                                    </select>
                                    </div>
                                </div>

            <div class="text-right">
                <input type="submit" class="btn btn-primary" value="Create Training"/>
            </div>
    
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->
<!-- /Main Wrapper -->
        
		
			
			
			
        
		
        @include('admin.partials.script')
        {{-- <script>
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
        </script> --}}
        <script>
            const checkboxes = document.querySelectorAll('.employee-checkbox');
            const numOfEmployeesInput = document.getElementById('num_of_employees');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selectedCheckboxes = document.querySelectorAll('.employee-checkbox:checked');
                    numOfEmployeesInput.value = selectedCheckboxes.length;
                });
            });
        </script>
    </body>
</html>




