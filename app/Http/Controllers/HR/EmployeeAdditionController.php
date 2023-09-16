<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use App\Models\Addition;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\SalarySlip;
use App\Models\Overtime;
use App\Models\Deduction;

class EmployeeAdditionController extends Controller
{
    //

    public function index()
    {
        $employees = Employee::with('additions')->get();
        return view('HR.EmployeeAddition.index', compact('employees'));
    }

    public function create($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('HR.EmployeeAddition.create', compact('employee'));
    }

    public function store(Request $request, $employeeId)
    {
        $data = $request->validate([
            'month' => 'required|numeric',
            'basic_salary' => 'required|numeric',
            'bonus' => 'required|numeric',
            'allowance' => 'required|numeric',
            'conveyance' => 'required|numeric',
        ]);

        $data['employee_id'] = $employeeId;
        $data['month'] = $request->input('month');
        Addition::create($data);

        return redirect()->route('addition.index')->with('success', 'Additions created successfully.');
    }

    public function edit($employeeId, $additionId)
    {
        $employee = Employee::findOrFail($employeeId);
        $addition = Addition::findOrFail($additionId);
        return view('HR.EmployeeAddition.edit', compact('employee', 'addition'));
    }

    public function update(Request $request, $employeeId, $additionId)
    {
        $data = $request->validate([
            'month' => 'required',
            'basic_salary' => 'required|numeric',
            'bonus' => 'required|numeric',
            'allowance' => 'required|numeric',
            'conveyance' => 'required|numeric',
        ]);

        $addition = Addition::findOrFail($additionId);
        $addition->update($data);

        return redirect()->route('addition.index')->with('success', 'Additions updated successfully.');
    }

    


    public function generateSlip($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $additions = Addition::where('employee_id', $employeeId)->first();
       
   
        $deductions = Deduction::first(); 
        // $overtime = Overtime::where('employee_id', $employeeId)->sum('hours_worked');
        $selectedMonth = $additions->month;
        
       
        $overtime = Overtime::where('employee_id', $employeeId)->whereMonth('overtime_date', $selectedMonth)->sum('hours_worked');
        

        $total_days_in_month = Carbon::createFromDate(null, $selectedMonth, null)->daysInMonth;

        $attendance = Attendance::where('employee_id', $employeeId)
        ->whereYear('date', Carbon::now()->year)
        ->whereMonth('date', $selectedMonth)
        ->where('status', 'present')
        ->count();
    
        $basicSalary = $additions->basic_salary;
        $basic_salary_after_deductions = ($additions->basic_salary / $total_days_in_month) * $attendance;
        $bonus = $additions->bonus;
        $allowance = $additions->allowance;
        $conveyance = $additions->conveyance;
        $totalSalary = $basic_salary_after_deductions + $bonus + $allowance + $conveyance;

     
        $taxPercent = $deductions->tax_percent;
        $fundPercent = $deductions->fund_percent;
        $tax = ($totalSalary * $taxPercent) / 100;
        $fund = ($totalSalary * $fundPercent) / 100;
        $totalDeductions = $tax + $fund;
       
        $netSalary = $totalSalary - $totalDeductions + ($overtime*150);

        
        $salarySlip = new SalarySlip([
            'employee_id' => $employee->id,
            'basic_salary' => $additions->basic_salary,
            'attendance' => $attendance,
            'basic_salary_after_deductions' => $basic_salary_after_deductions,
            'bonus' => $additions->bonus,
            'allowance' => $additions->allowance,
            'conveyance' => $additions->conveyance,
            'total_salary' => $totalSalary,
            // 'selectedMonth' => $selectedMonth, 
            'total_deductions' => $totalDeductions,
            'tax' => $tax,
            'fund' => $fund,
            // 'overtime' => $overtime ,
            'overtime_earnings' => $overtime * 150,
            'net_salary' => $netSalary,
        ]);
        $salarySlip->save();

        return view('HR.EmployeeAddition.salary_slip', compact('employee', 'additions', 'deductions', 'overtime', 'totalSalary', 'totalDeductions' ,'tax', 'fund', 'netSalary', 'selectedMonth','basic_salary_after_deductions', 'attendance'));
    }

    public function downloadPdfReport()
    {
        $salarySlips = SalarySlip::with('employee')->get();
       

        $pdf = PDF::loadView('HR.EmployeeAddition.pdf_report', compact('salarySlips'));
        $pdfFileName = 'salary_slips_report.pdf';

        return $pdf->download($pdfFileName);
    }



    public function downloadEmployeeSalarySlip($employeeId)
{
    $employee = Employee::findOrFail($employeeId);
    $salarySlip = SalarySlip::where('employee_id', $employeeId)->first();
    
    if (!$salarySlip) {
        return redirect()->back()->with('error', 'Salary Slip not found for the employee.');
    }
    $selectedMonth = Addition::where('employee_id', $employeeId)->value('month');

    $pdf = PDF::loadView('HR.EmployeeAddition.employee_salary_slip', compact('employee', 'salarySlip','selectedMonth'));
    $pdfFileName = 'employee_salary_slip_' . $employee->id . '.pdf';

    return $pdf->download($pdfFileName);
}

}
