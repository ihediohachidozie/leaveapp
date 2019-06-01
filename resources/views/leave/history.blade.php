@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }} 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
        </div>
    @endif 
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col"><h4>Employees Leave Application Entries</h4></div>
                <div class="col"><a href="{{asset('/home')}}" class="btn btn-primary float-right btn-sm">Back</a></div>
            </div>
            
            
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        {{--  <th>S/N</th> --}}
                        <th>Staff ID</th>
                        <th>Start Date</th>
                        <th>Days</th>
                        <th>Leave Type</th>
                        <th>Leave Year</th>
                        <th>Duty Reliever</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($leaves->all())      

                        <?php $i = 0; ?>
                        @foreach($leaves as $leave)
                            <tr>
                               {{--  <td>{{++$i}}</td> --}}
                                <td>{{$leave->employee->staffid}}</td>
                                <td>{{$leave->startdate}}</td>
                                <td>{{$leave->days}}</td>
                                <td>{{$leave->leavetype}}</td>
                                <td>{{$leave->leaveyear}}</td>
                                <td>{{$leave->dutyreliever}}</td>
                                
                                <td class="text-center"><a href="{{ route('leaves.edit', $leave->id) }}"><i class="fa fa-edit" style="font-size:36px"></i></a></td>
                                <td class="text-center">
                                        <form action="{{ route('leaves.destroy', $leave->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
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
@endsection 