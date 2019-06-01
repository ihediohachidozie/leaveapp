@extends('layouts.app')


@section('content')
    <div class="card" style="border:none">
        <div class="card" id="card" style="border:none">

            <div class="card-header">
                <h4>{{$emp->firstname}} {{' '}} {{$emp->lastname}}'s Leave History</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p class="card-text">{{'Staff ID : '}}{{$emp->staffid}} </p>
                    </div>
                    <div class="col">
                        <p class="card-text">{{'Department : '}}{{$emp->department->name}} </p>
                    </div>
                </div>
                        
            </div>
            <div class="card-body">
                @if (count($leaves) > 0)      
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Start Date</th>
                                <th>Days</th>
                                <th>Leave Type</th>
                                <th>Leave Year</th>
                                <th>Duty Reliever</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leave)
                                <tr>
                                    <td>{{$leave->startdate}}</td>
                                    <td>{{$leave->days}}</td>
                                    <td>{{$leave->leavetype}}</td>
                                    <td>{{$leave->leaveyear}}</td>
                                    <td>{{$leave->dutyreliever}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $leaves->render() }}
                @else
                    <strong>no leave history record found!</strong>
                @endif
            </div>
        </div>
        <div class="card-body">
            <a href="{{asset('leaves/')}}" class="btn btn-primary btn-sm">Go Back</a>
            <button class="btn btn-success btn-sm float-right" onclick="printContent('card')">Print</button>
        </div>
    </div>

@endsection

