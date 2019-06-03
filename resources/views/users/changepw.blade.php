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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                            <div class="row">
                                <div class="col"><h4>Change Password</h4></div>
                                
                            </div> 
                    </div>
                    <div class="card-body">                   
                        <form action="{{ route('users.update', ['user'=>$user]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group py-1"> 
                                <label for="current-password">Current password</label>
                                <input type="password" name="current_password" class="form-control" >            
                                <div class="text-danger">{{ $errors->first('current_password') }}</div>
                            </div>
                            <div class="form-group py-1"> 
                                <label for="password">New password</label>
                                <input type="password" name="password" class="form-control" >            
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            </div>
                            <div class="form-group py-1">
                                <label for="confirm-password">Confirm new password</label>                                        
                                <input type="password" name="confirm_password" class="form-control" >            
                                <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                            </div>


                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    </div>   
@endsection


