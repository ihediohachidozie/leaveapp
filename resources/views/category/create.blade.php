@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Enter Staff Category</h4>
                    </div>
                    <div class="card-body">                   
                        <form action="{{route('category.store')}}" method="post">
                            
                            @include('category.form')
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>     

    </div>

@endsection