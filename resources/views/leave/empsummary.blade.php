@extends('layouts.app')


@section('content')
<div class="card" style="border:none">
    <div class="card" id="card" style="border:none">

        <div class="card-header">
            <h4>{{$emp->firstname}} {{' '}} {{$emp->lastname}}'s Leave Summary</h4>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col">
                    <p class="card-text">{{'Staff ID : '}}{{$emp->staffid}} </p>
               </div>
               <div class="col">
                    <p class="card-text">{{'Department : '}}{{$emp->department->name}} </p>
               </div>
           </div>
            
            
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                <th colspan="3" class="text-center">LEAVE SUMMARY</th>
                </tr>
                <tr class="text-center">
                    <th>Year</th>
                    <th>Days Utilized</th>
                    <th>Days Outstanding</th>
                </tr>
                @foreach ($staffleave as $key => $value)

                    <tr class="text-center">
                        <td>{{$key}} </td>
                        <td class="text-center">{{$value}}</td>
                        <td class="text-center">{{$emp->category->days - $value}}</td>
                    </tr>  


                @endforeach
            </table>

            <br><br>

        </div>
    
    </div>
    <div class="card-body">
        <a href="{{asset('leaves/')}}" class="btn btn-primary btn-sm">Go Back</a>
        <button class="btn btn-success btn-sm float-right" onclick="printContent('card')">Print</button>
    </div>

</div>

@endsection

