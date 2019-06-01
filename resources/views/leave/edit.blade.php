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
        
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Leave Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('leaves.update', $leave->id)}}" method="post">
                       @include('leave.form')
                        @method('PATCH')

                        <input type="hidden" name="olddays" value="{{$leave->days}}">
                        <input type="hidden" name="oldstartdate" value="{{$leave->startdate}}">

                        <button type="submit" class="btn btn-primary btn-lg">Modify</button>                         
                    </form>
                    <br><p></p>
                </div>
                <div class="card-footer text-muted">
                    <p></p>
                </div>
            
            </div>
        </div>
    </div>
@endsection