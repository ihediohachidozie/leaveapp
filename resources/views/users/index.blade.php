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
                <div class="col"><h4>Users</h4></div>
                <div class="col"><a href="{{asset('/home')}}" class="btn btn-outline-success btn-sm float-right">Back</a></div>
            </div>            
        </div>
        <div class="card-body">
            {{-- <a href="{{route('departments.create')}}" class="btn btn-primary btn-sm">Add</a> --}}
            

        </div>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th class="text-center">Activate</th>
                        <th class="text-center">De-activate</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @if ($user->id != 1)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td class="text-center">
                                    <form action="{{ route('users.update', ['user'=>$user]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="active" value="1">
                                        <button type="submit" {{$user->active == 1 ? 'disabled' : ''}}>
                                            <i class="fa fa-user" style="color:blue"></i>
                                        </button>
                                    </form>                               
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('users.update', ['user'=>$user]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="active" value="0">
                                    <button type="submit" {{$user->active == 0 ? 'disabled' : ''}}>
                                        <i class="fa fa-user-o" style="color:red"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{ $users->render() }}
        </div>
    </div>    
@endsection


