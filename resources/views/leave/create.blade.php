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

    <div class="row">
        @include('leave.empdetail')
        
                <a href="{{asset('leaves/')}}" class="btn btn-outline-success">Go Back</a>
            </div>

            <div class="card-footer text-muted">
                <p></p>
            </div>
        </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Leave Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('leaves.store')}}" method="post">
 
                        @include('leave.form')
                    
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>

                            
                    </form>
                  
                    </div>
                    <div class="card-footer text-muted">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection