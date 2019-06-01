@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit <strong>{{ $category->name}}</strong> Staff Category</h4>
                    </div>
                    <div class="card-body">                   
                        <form action="{{ route('category.update', ['category' => $category]) }}" method="post">
                            @method('patch')
                            @include('category.form')
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>     

    </div>

@endsection