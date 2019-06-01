@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Employee Details</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{'Full Name : '}}{{$employee->firstname}} {{' '}} {{$employee->lastname}}</h5>
            <p class="card-text">{{'Staff ID : '}}{{$employee->staff_id}} </p>
            <p class="card-text">{{'Department : '}}{{$dept->name}} </p>
            <p class="card-text">{{'Employment Date : '}}{{$employee->empt_date}} </p>
            <p class="card-text">{{'Staff Category : '}}{{$employee->staffCategory}} </p>
            <hr>
            <p class="card-text">{{'Phone : '}}{{$employee->phone}} </p>
            <p class="card-text">{{'Address : '}}{{$employee->address}} </p>
            <p class="card-text">{{'Emergency Contact : '}}{{$employee->emergency_contact}} </p>
            <a href="{{asset('employees/')}}" class="btn btn-outline-success">Go Back</a>
        </div>
        <div class="card-footer text-muted">
            <p>Viewed on {{now()->toDateString()}} at {{now()->toTimeString()}}</p>
        </div>
    </div>


@endsection