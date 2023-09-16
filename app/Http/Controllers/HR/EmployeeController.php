<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Session;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\models\user;
use App\models\EmpStatus;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    
    { $search=$request['search'] ?? "";
        if($search != ""){
            $emp=Employee::Where('Firstname','=',$search)->get();
        }
        else{
            $emp=Employee::all(); 
        }

        $employeeCount = Employee::count();
        return view('HR.Employee.index',compact('emp', 'employeeCount'));
    }

    public function create()
    {   $emp=Department::select(['id','DepName'])->get();
        $deg=Designation::select(['id','Name'])->get(); 
        $emp_status=EmpStatus::select(['id','status'])->get();
        $user=user::select(['id'])->get();
        return view('HR.Employee.create' , compact('emp','deg','emp_status','user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'Firstname'          =>  'required',
            'Email'         =>  'required',
            'avatar'     =>  'image|mimes:jpg,png,jpeg,gif,svg',
            'job_status' => 'required|in:active,inactive,resigned,terminated',
            'role' => 'required|in:admin,employee'
            // 'image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = time() . '.' . request()->avatar->getClientOriginalExtension();

        request()->avatar->move(public_path('images'), $file_name);
        $emp = new Employee;

        $emp->job_status = $request->input('job_status');
        $emp->role = $request->input('role');
        $emp->Firstname = $request->Firstname;
        $emp->Email = $request->Email;
        $emp->start_date = $request->start_date;
        $emp->avatar = $file_name;
        $emp->department_id=$request->department;
        $emp->designation_id=$request->designation;
        $emp->emp_status_id=$request->emp_status;
        $emp->user_id=$request->user;
        $emp->save();
        Session::flash('success', 'Employee added successfully.');
        return redirect()->route('employee.index');

       
    }

    public function show($id)
{
   
    $emp=Employee::find($id);
    return view ('HR.Employee.show')->with('emp',$emp);
}

public function edit($id)
{
    $dept=Department::all();
    $deg=Designation::all();
    $emp_status=EmpStatus::all();
    $user=user::all();
    $emp=Employee::find($id);
    return view ('HR.Employee.edit',compact('emp','dept','deg','emp_status','user'));
}

public function update(Request $request,$id)
{
    $request->validate([
        'Firstname'          =>'required',
        'Email'         =>  'required',
        'avatar'     =>  'image|mimes:jpg,png,jpeg,gif,svg',
        'job_status' => 'required|in:active,inactive,resigned,terminated',
        'role' => 'required|in:admin,employee'
    ]);
    $avatar = $request->hidden_image;
    if($request->avatar != '')
        {
            $avatar = time() . '.' . request()->avatar->getClientOriginalExtension();

            request()->avatar->move(public_path('images'), $avatar);
        }
        $emp = Employee::find($request->hidden_id);
        $emp->job_status = $request->input('job_status');
        $emp->role = $request->input('role');
        $emp->Firstname = $request->Firstname;
        $emp->Email = $request->Email;
        $emp->start_date = $request->start_date;
        $emp->avatar = $avatar;
        $emp->department_id = $request->department;
        $emp->designation_id = $request->designation;
        $emp->emp_status_id=$request->emp_status;
        $emp->user_id = $request->user;
        $emp->save();
        Session::flash('success', 'Employee updated successfully.');
        return redirect('employee/index');
}

public function destroy($id)
{
    $emp = Employee::find($id);

    if (!$emp) {
        return response()->json(['success' => false, 'message' => 'Employee not found!'], 404);
    }

    // Delete related attendance records
    $emp->attendances()->delete();
     $emp->employeeAttendances()->delete();
     $emp->files()->delete();
     $emp->leaves()->delete();
     $emp->projects()->delete();
     $emp->trainer()->detach();
    //  $emp->trainings()->delete();
    //  $emp->trainingtype()->delete();
     \DB::table('additions')->where('employee_id', $emp->id)->delete();
    //  \DB::table('trainers')->where('employee_id', $emp->id)->delete();
    //  \DB::table('trainings')->where('trainer_id', $emp->id)->delete();
    //  \DB::table('training_type')->where('employee_id', $emp->id)->delete();

     

    // Delete the employee
    $emp->delete();

    if (request()->ajax()) {
        // For AJAX requests, return JSON response
        return response()->json(['success' => true, 'message' => 'Employee deleted successfully!']);
    } else {
        // For regular form submissions, redirect to the desired route
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully!');
    }
}

public function generateEmployeeListPdf()
    {
        $employees = Employee::all(); // Fetch all employees

        $pdf = PDF::loadView('HR.Employee.employee_list_pdf', compact('employees'));

        return $pdf->download('employee_list.pdf');
    }

public function generatePdf(Employee $employee)
{
    $pdf = PDF::loadView('HR.Employee.pdf', compact('employee'));

    return $pdf->download('employee_' . $employee->id . '.pdf');
}


}
