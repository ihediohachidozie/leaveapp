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
            <div class="card-body table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Start Date</th>
                            <th>Days</th>
                            <th>Leave Type</th>
                            <th>Leave Year</th>
                            <th>Duty Reliever</th>
                            <th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($leaves) > 0)      

                            @foreach($leaves as $leave)
                                <tr>
                                    <td>{{$leave->startdate}}</td>
                                    <td>{{$leave->days}}</td>
                                    <td>{{$leave->leavetype}}</td>
                                    <td>{{$leave->leaveyear}}</td>
                                    <td>
                                        @foreach ($employees as $employee)
                                            @if ($employee->staffid == $leave->dutyreliever)
                                                {{$employee->firstname}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center"><a href="{{ route('leaves.edit', $leave->id) }}"><i class="fa fa-edit" style="font-size:36px"></i></a></td>
                                    <td class="text-center">
                                        <form action="{{ route('leaves.destroy', $leave->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" {{ auth()->id() != 1 ? 'disabled' : ''}}>
                                                <i class="fa fa-remove" style="color:red"></i>
                                            </button>
                                        </form>                                
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $leaves->render() }}
            </div>
        </div>
        <div class="card-body">
            <a href="{{asset('leaves/')}}" class="btn btn-primary btn-sm">Go Back</a>
            <button class="btn btn-success btn-sm float-right" onclick="printContent('card')">Print</button>
        </div>
    </div>

@endsection

