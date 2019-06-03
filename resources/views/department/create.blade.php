@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Enter a Department</h4>
                    </div>
                    <div class="card-body">                   
                        <form action="{{route('departments.store')}}" method="post">
                            @csrf
                            @include('department.form')
                            <button type="submit" class="btn btn-primary">Create Department</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    </div>

@endsection