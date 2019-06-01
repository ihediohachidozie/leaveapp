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
    <div class="card" style="border:none">
        <div class="card-header">
            <div class="row">
                <div class="col"><h4>Employee Leave Application</h4></div>
                <div class="col"><a href="{{asset('/home')}}" class="btn btn-primary btn-sm float-right">Back</a></div>
            </div>        
        </div>
        <br>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Staff ID</th>
                        <th>Fullname</th>
                        <th colspan="3" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employees->all())      
  
                        <?php $i = 0; ?>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$employee->staffid}}</td>
                                <td>{{$employee->firstname}} {{ ' '}} {{$employee->lastname}}</td>
                                <td class="text-center"><a href="{{ route('leaves.show',$employee->id) }}" class="btn btn-primary btn-sm">Apply</a></td>
                                <td class="text-center"><a href="{{ route('leaves.emphistory',[$employee->id]) }}" class="btn btn-primary btn-sm"> History</a></td>
                                <td class="text-center"><a href="{{ route('leaves.leavesummary',[$employee->id]) }}" class="btn btn-primary btn-sm"> Summary</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $employees->render() }}
        
        </div>
    </div>

@endsection