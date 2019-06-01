@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome To leave Management System Application</h1>
    <p>This system is designed to keep records of employees' leave applications </p>
    <p> <a href="{{ route('login') }}" class="btn btn-primary btn-lg" role="button">{{ __('Login') }}</a>
         <a href="{{ route('register') }}" class="btn btn-success btn-lg" role="button">{{ __('Register') }}</a></p>
</div>
  
@endsection