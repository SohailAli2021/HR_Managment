<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Employee; 
use App\Models\Department;
use App\Models\Leave;
use App\Models\Job;
use App\Models\Project;
use App\Models\JobApplication;


class ViewComposerServiceProvider extends ServiceProvider
{


    public function boot()
    {
        View::composer(['admin.partials.welcomeadmin', 'emp.partials.welcomeemp' ],function ($view) {
            $employeeCount = Employee::count();
            $departmentCount = Department::count();
            $totalLeaves = Leave::count();
            $jobapplicationCount = JobApplication::count();
           
            if (auth()->user() && auth()->user()->isEmployee()) {
                $employee = auth()->user()->employee;
                $projectCount = $employee->projects()->count();
                $view->with('projectCount', $projectCount);
            }
            $view->with([
                'employeeCount' => $employeeCount,
                'departmentCount' => $departmentCount,
                'totalLeaves' => $totalLeaves,
                'jobapplicationCount' => $jobapplicationCount,
            ]);
        });
    }


    
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    // public function boot(): void
    // {
    //     //
    // }
}
