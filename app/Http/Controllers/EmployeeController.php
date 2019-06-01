<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use App\Category;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $employees = Employee::paginate(15);

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employee = new Employee();
        $departments = Department::all();
        $categories = Category::all();

        return view('employee.create', compact('employee', 'departments', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
        $employee = Employee::create($this->validateRequest());
 
       return redirect('employees')->withStatus(__('Employee successfully saved'));
    }

    private function validateRequest()
    {
        return request()->validate([
            'firstname' => 'required|max:25',
            'lastname' => 'required|max:25',
            'department_id' => 'required',
            'category_id' => 'required',
            'staffid' => 'required|numeric|unique:employees',
            'user_id' => 'required',
            'phone' => 'sometimes',
            'emergencyaddress' => 'sometimes',
            'emergencyphone' => 'sometimes',
            'address' => 'sometimes',
            'employmentdate' => 'sometimes',
            'maritalstatus' => 'sometimes'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
       // dd($employee->employmentdate);
        $departments = Department::all();
        $categories = Category::all();
        return view('employee.edit', compact('employee', 'departments', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $employee->update($this->validateRequest());
 
        return redirect('employees')->withStatus(__('Employee successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('employee')->withStatus(__('employee successfully deleted!'));
    }
}
