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
        <h4>Employees</h4>
    </div>

    <div class="card-body">
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">Add</a>
        <a href="{{asset('/home')}}" class="btn btn-outline-success btn-sm float-right">Back</a>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Created By</th>
                    <th colspan="2" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($employees->all())               
                    @foreach($employees as $employee)
                        <tr> 
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->staffid}}</td>
                            <td>{{$employee->firstname}} {{ ' '}} {{$employee->lastname}}</td>
                            <td>{{$employee->user->name}}</td>
                            <td class="text-center"><a href="{{ route('employees.edit', ['employee'=>$employee]) }}"><i class="fa fa-edit" style="font-size:36px"></i></a></td>
                            <td class="text-center">
                                <form action="{{ route('employees.destroy', ['employee' => $employee ]) }}" method="post">
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
        {{ $employees->render() }}
        
        
    </div>
    
</div>
@endsection