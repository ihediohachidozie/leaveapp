@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit {{ $employee->firstname .' '. $employee->lastname}} </h4>
        </div>
        <div class="card-body">
            <form action="{{route('employees.update', ['employee' => $employee])}}" method="post">
                @include('employee.form')
                @method('PATCH')
                <button type="submit" class="btn btn-primary">Update Employee</button>
                <a href="{{asset('/employees')}}" class="btn btn-outline-success btn-sm float-right">Go Back</a>
            </form>
            
        </div>
    </div>
@endsection