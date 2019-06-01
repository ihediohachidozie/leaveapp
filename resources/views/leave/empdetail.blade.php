<div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h4>Employee Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="card-title">{{'Full Name : '}}{{$emp->firstname}} {{' '}} {{$emp->lastname}}</h5>
                    </div>
                    <div class="col-4">
                        <p class="card-text">{{'Staff ID : '}}{{$emp->staffid}} </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <p class="card-text">{{'Department : '}}{{$emp->department->name}} </p>
                    </div>
                    <div class="col-4">
                        <p class="card-text">{{'Staff Category : '}}{{$emp->category->name}} </p>
                    </div>
                </div>                    
                
                <?php //$id = $employee->id; 
                     // $staffid = $employee->staffid;
                ?>
                
                {{-- <p class="card-text">{{'Employment Date : '}}{{$emp->employmentdate}} </p> --}}
                
                <hr>
                <table class="table table-bordered">
                        <tr>
                        <th colspan="3" class="text-center">Leave Summary</th>
                        </tr>
                        <tr class="text-center">
                            <th>Year</th>
                            <th>Days Utilized</th>
                            <th>Days Outstanding</th>
                        </tr>
                        @foreach ($staffleave as $key => $value)
                            @if ($value != $emp->category->days)
                                <tr class="text-center">
                                    <td>{{$key}} </td>
                                    <td class="text-center">{{$value}}</td>
                                    <td class="text-center">{{$emp->category->days - $value}}</td>
                                </tr>  
                            @endif

                        @endforeach
                    </table>


                <a href="{{asset('leaves/')}}" class="btn btn-outline-success">Go Back</a>
            </div>

            <div class="card-footer text-muted">
                <p></p>
            </div>
        </div>
    </div>