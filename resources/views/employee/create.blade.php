@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Add Employee</h4>
        </div>
        <div class="card-body">
            <form action="{{route('employees.store')}}" method="post">
                @include('employee.form')
                <button type="submit" class="btn btn-primary">Create Employee</button>
                <a href="{{asset('/employees')}}" class="btn btn-outline-success btn-sm float-right">Go Back</a>
            </form>
            
        </div>
    </div>
@endsection
