@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                        </div>
                    @endif

                    
                    Welcome {{ auth()->user()->name}} 
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="border:none; background-color:lavender;">
                                <div class="card-body" >
                                    <p>
                                        To add, edit or view departments, click on <b>Department</b> button.
                                    </p>
                                    
                                    <a href="{{asset('departments')}}" class="btn btn-primary btn-sm ">Department</a>
                                </div>
                            </div>                         
                        </div>
                        <div class="col">
                            <div class="card" style="border:none; background-color:lavenderblush;">
                                <div class="card-body" >
                                    <p>
                                        To add, edit or view employees, click on <b>Employee</b> button.
                                    </p>                          
                                    <a href="{{asset('employees')}}" class="btn btn-primary btn-sm">Employee</a>
                                </div>
                            </div>
                        </div> 
                            
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="border:none; background-color:lavenderblush;">
                                <div class="card-body" >
                                    <p>
                                        To apply for leave, view employee's leave history or summary, click on <b>Leave Application</b> button.
                                    </p>                           
                                    <a href="{{asset('leaves')}}" class="btn btn-primary btn-sm">Leave Application</a>
                                </div>
                            </div>                         
                        </div>
                        <div class="col">
                            <div class="card" style="border:none; background-color:lavender;">
                                <div class="card-body" >
                                    <p>
                                        To modify leave application or remove applied leave entry, click on <b>Leave Application Entries</b> button.
                                    </p>
                                    
                                    <a href="{{asset('leave/history')}}" class="btn btn-primary btn-sm ">Leave Application Entries</a>
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="border:none; background-color:lavender;">
                                <div class="card-body" >
                                    <p>
                                        To add, edit or view staff category, click on <b>Category</b> button.
                                    </p>
                                    
                                    <a href="{{asset('category')}}" class="btn btn-primary btn-sm ">Category</a>
                                </div>
                            </div>                         
                        </div>
                        <div class="col">
                            @if (auth()->id() == 1)
                                <div class="card" style="border:none; background-color:lavenderblush;">
                                    <div class="card-body" >
                                        <p>
                                            To grant users access in the system, click on <b>Active User</b> button.
                                        </p>                          
                                        <a href="{{asset('users')}}" class="btn btn-primary btn-sm">Activate Users</a>
                                    </div>
                                </div>
                            @endif

                        </div> 
                            
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
   

@endsection
