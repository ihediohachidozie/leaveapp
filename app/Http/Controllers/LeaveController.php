<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Department;
use App\User;
Use App\Leave;
use DB;

class LeaveController extends Controller
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
        $employees = Employee::paginate(15);

        return view('leave.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
   
    }

    private function validatedData()
    {
        return request()->validate([
            'startdate' => 'required|date|date_format:Y-m-d',
            'days' => 'required|integer|between:1,30',
            'leavetype' => 'required',
            'leaveyear' => 'required',
            'dutyreliever' => 'required',
            'employee_id' => 'required',
            'user_id'   => 'required'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->sameleavedate($request->employee_id, $request->startdate) == 0)
        {
            if($this->outstandingleavedays($request->employee_id, $request->leaveyear, $request->days))
            {
                $leave = Leave::create($this->validatedData());
                
                return redirect('leaves')->withStatus('Leave Application is successfully saved');  
            }
            else{
                return back()->withStatus(__('You have exceed approved leave days!'));
            }
        }
        else{
            return back()->withStatus(__('Entry already exist!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::all();
        $leave = new Leave();
        $emp = Employee::find($id);
        $staffleave = $this->leavegroupedbyyear($id);

        return view('leave.create', compact('employees', 'emp', 'staffleave', 'leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::all();

        $leave = Leave::find($id);

        $emp = Employee::find($leave->employee_id);

        $staffleave = $this->leavegroupedbyyear($leave->employee_id);

        return view('leave.edit', compact('employees', 'leave', 'emp', 'staffleave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->startdate == $request->oldstartdate)
        {
            if($this->outstandingleavedays4edit($request->employee_id, $request->leaveyear, $request->days, $request->olddays))
            {
                $leave = Leave::find($id);

                $leave->update($this->validatedData());
                
                return redirect('leave/history')->withStatus('Leave Application is successfully updated');  
            }
            else{
                return back()->withStatus(__('You have exceed approved leave days!'));
            }
        }else
        {
            if($this->sameleavedate($request->employee_id, $request->startdate) == 0)
            {
    
                if($this->outstandingleavedays4edit($request->employee_id, $request->leaveyear, $request->days, $request->olddays))
                {
                    $leave = Leave::find($id);
    
                    $leave->update($this->validatedData());
                    
                    return redirect('leave/history')->withStatus('Leave Application is successfully updated');  
                }
                else{
                    return back()->withStatus(__('You have exceed approved leave days!'));
                }
            }
            else{
                return back()->withStatus(__('Entry already exist!'));
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->id == 1){
            $leave = Leave::findOrFail($id);
            $leave->delete();
    
            return redirect('leave/history')->withStatus(__('Leave Application is successfully deleted'));

        }else{
            return redirect('leave/history')->withStatus(__('Unauthorized action!'));
        }
    }

    private function leavegroupedbyyear($id)
    {
        // grouping the leave entries by year
        $lsum = DB::table('leaves')
        ->select('leaveyear', DB::raw('sum(days) as days'))
        ->where('employee_id', $id)
        ->groupBy('leaveyear')
        ->pluck('days', 'leaveyear');

        return $lsum;
    }

    private function sameleavedate($id, $date)
    {
        // Check for existing leave entry...
        // checking if the same employee has applied before with the same start date...
        
        $result =  DB::table('leaves')->where([
            ['employee_id', '=', $id], 
            ['startdate', '=', $date]
            ])->count();

            // Return the values
        return $result;


    }

    private function outstandingleavedays($id, $year, $lday)
    {
        // Check for outstanding leave days for a particular year...
      
        $sum = DB::table('leaves')
        ->where([['employee_id', $id],
        ['leaveyear', $year]])
        ->groupBy('leaveyear')
        ->sum('days');

        // Get staff category ...
        $employee = Employee::find($id);

        $result = (($sum + $lday) <= $employee->category->days ) ? true : false;

        // if true proceed else false deny application

        return $result;

    }

    public function emphistory($id)
    {
        $emp = Employee::find($id);
        $employees = Employee::all();

        $leaves = Db::table('leaves')->where('employee_id', $id)->orderBy('leaveyear')->paginate(10);
        
        return view('leave.emphistory', compact('leaves', 'emp', 'employees'));
 
    }

    public function leavesummary($id)
    {
        $emp = Employee::find($id);

        $staffleave = $this->leavegroupedbyyear($id);
  
        return view('leave.empsummary', compact('emp', 'staffleave'));

    }

    public function allhistory()
    {
        $leaves = Leave::paginate(10);

        $employees = Employee::all();

        return view('leave/history', compact('leaves', 'employees'));
    }

    private function outstandingleavedays4edit($id, $year, $lday, $oldday)
    {
        // Get staff category ...
        $employee = Employee::find($id);
      
        $sum = DB::table('leaves')
        ->where([['employee_id', $id],
        ['leaveyear', $year]])
        ->groupBy('leaveyear')
        ->sum('days');

        $result = (($sum + $lday - $oldday) <= $employee->category->days ) ? true : false;

        // if true proceed else false deny application

        return $result;
        //return ($sum + $lday - $oldday);
    }

}
