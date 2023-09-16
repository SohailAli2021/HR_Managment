{{-- <div class="col-md-6 col-6 text-center">
    <div class="stats-box">
        <p style="font-size: 25px">Welcome! {{@Auth::user()->name}} </p>
        <h6 style="font-size: 20px">Employee Dashboard</h6>
    </div>
</div> --}}

	<!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="welcome-box">
                    <div class="welcome-img">
                        @php
                        $user = Auth::user();
                        $employee = $user->employee; // Assuming you have an 'employee' relationship in the User model
                        $avatar = $employee ? $employee->avatar : 'default-avatar.jpg';
                    @endphp
                        <img alt="" src="{{ asset('images/' . $avatar) }}">
                    </div>
                    <div class="welcome-det">
                        <h3>Welcome, {{@Auth::user()->name}}</h3>
                        <p>Employee Dashboard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


            
<div class="row" style="padding-left: 15px">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                <div class="dash-widget-info">
                    {{-- <h3>{{ $projectCount }}</h3> --}}
                    <span>Projects</span>
                </div>
            </div>
        </div>
    </div>
</div>
