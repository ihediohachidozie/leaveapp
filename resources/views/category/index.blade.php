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
            <h4>Staff Categories</h4>
        </div>
        <div class="card-body">
            <a href="{{route('category.create')}}" class="btn btn-primary btn-sm">Add</a>
            <a href="{{asset('/home')}}" class="btn btn-outline-success btn-sm float-right">Back</a> 
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Staff Category</th>
                        <th class="text-center">Days Approved</th>
                        <th class="text-center">Staff Count</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td class="text-center">{{$category->days}}</td>
                            <td class="text-center">{{$category->employees->count()}}</td>
                            <td class="text-center"><a href="{{ route('category.edit', ['category'=>$category]) }}"><i class="fa fa-edit" style="font-size:36px"></i></a></td>
                            <td class="text-center">
                                <form action="{{ route('category.destroy', ['category'=>$category]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" disabled>
                                    <i class="fa fa-remove" style="color:red; border:0px;"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->render() }}
        </div>
    </div>
  

@endsection