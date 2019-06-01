@csrf
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="inputCity">Start Date</label>
            <input type="date" class="form-control" name="startdate" value="{{ old('startdate') ?? $leave->startdate }}">
            <div class="text-danger">{{ $errors->first('startdate') ? 'Start date is required' : '' }}</div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="inputState">Number of Days</label>
            <input type="number" class="form-control" name="days" min="1" max="30" value="{{ old('days') ?? $leave->days }}">
            <div class="text-danger">{{ $errors->first('days') ? 'No of Days is required' : ''}}</div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="inputState">Leave year</label>
                <select name="leaveyear" class="form-control">
                    <option value="">Choose...</option>
                    @for ($i = 2006; $i < 2050; $i++)
                        <option value="{{$i}}" {{$leave->leaveyear == $i ? 'selected' : '' }}>{{$i}}</option>
                    @endfor
                </select>
                <div class="text-danger">{{ $errors->first('leaveyear') ? 'Leave year is required' : '' }}</div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="inputState">Leave Type</label>
                <select name="leavetype" class="form-control">
                    <option value="">Choose...</option>
                    @foreach ($leave->typeOptions() as $typeOptionKey => $typeOptionValue)
                        <option value="{{ $typeOptionKey}}" {{ $leave->leavetype == $typeOptionKey ? 'selected' : ''}}> {{ $typeOptionValue }}</option>
                    @endforeach
                </select>
                <div class="text-danger">{{ $errors->first('leavetype') ? 'Leave Type is required' : '' }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="inputZip">Duty Reliever</label>
                <select name="dutyreliever" class="form-control">
                    <option value="">Choose...</option>
                    @foreach ($employees as $employee)
                        @if ($emp->id != $employee->id)
                            <option value="{{$employee->id}}" {{$leave->dutyreliever == $employee->id ? 'selected' : ''}}>{{$employee->firstname}} {{ ' '}} {{$employee->lastname}}</option>
                        @endif
                        
                    @endforeach
                </select>
                <div class="text-danger">{{ $errors->first('dutyreliever') ? 'Duty reliever is required' : ''}}</div>
            </div>
                   <input type="hidden" name="employee_id" value="{{$emp->id}}">
                   <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> 
        </div>
        <div class="col">
            
            
        </div>
    </div>