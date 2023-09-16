<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Overtime;

class OvertimeController extends Controller
{
    //
    public function index()
    {
        $overtimes = Overtime::with('employee')->get();
        return view('HR.Overtimes.index', compact('overtimes'));
    }

    public function show($id)
    {
       
        $overtime=Overtime::find($id);
        return view ('HR.Overtimes.show')->with('overtime',$overtime);
    }
    

    public function create()
    {
        $employees = Employee::all();
        return view('HR.Overtimes.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'month' => 'required|numeric',
            'employee_id' => 'required|exists:employees,id',
            'overtime_date' => 'required|date',
            'hours_worked' => 'required|numeric',
        ]);

        $overtime = new Overtime($data);
        $overtime->month = $request->input('month');
        $overtime->cost = $data['hours_worked'] * 150; 
        $overtime->save();

        return redirect()->route('overtimes.index')->with('success', 'Overtime entry created successfully.');
    }
    public function edit($id)
    {
        $overtime = Overtime::findOrFail($id);
        $employees = Employee::all();
        return view('HR.Overtimes.edit', compact('overtime', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|numeric|min:1|max:12',
            'overtime_date' => 'required|date',
            'hours_worked' => 'required|numeric',
        ]);

        $overtime = Overtime::find($id);
        $overtime->overtime_date = $request->input('overtime_date');
        $overtime->hours_worked = $request->input('hours_worked');
        $overtime->month = $request->input('month');
        $overtime->cost = $data['hours_worked'] * 150; 
        $overtime->save();

        
        return redirect('overtimes')->with('success', 'Overtime entry updated successfully.');
    }

    
    
    public function destroy($id)
    {
        $overtime = Overtime::findOrFail($id);
        $overtime->delete();

        return redirect('overtimes')->with('success', 'Overtime entry deleted successfully.');
    }
}
