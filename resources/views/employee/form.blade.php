
@csrf
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputEmail4">First Name</label>
        <input type="text" class="form-control" name="firstname" value="{{ old('firstname') ?? $employee->firstname}}" autocomplete="off" style="border-color:red">
        <div class="text-danger">{{ $errors->first('firstname') }}</div>
    </div>
    <div class="form-group col-md-3">
        <label for="inputPassword4">Last Name</label>
        <input type="text" class="form-control" name="lastname" value="{{ old('lastname') ?? $employee->lastname}}" autocomplete="off" style="border-color:red">
        <div class="text-danger">{{ $errors->first('lastname') }}</div>
    </div>
    <div class="form-group col-md-3">
        <label for="inputPassword4">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $employee->phone}}" autocomplete="off">
    </div>
    <div class="form-group col-md-3">
        <label for="inputPassword4">Martial Status</label>
        <select name="maritalstatus" class="form-control">
            <option value="" >Select ...</option>
            @foreach ($employee->maritalOptions() as $maritalOptionKey => $maritalOptionValue)
                <option value="{{ $maritalOptionKey}}" {{ $employee->maritalstatus == $maritalOptionKey ? 'selected' : ''}}> {{ $maritalOptionValue }}</option>
            @endforeach
        </select>
        
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="inputAddress">Contact Address</label>
        <input type="text" class="form-control" name="address" value="{{ old('address') ?? $employee->address}}" autocomplete="off">
    </div>
    <div class="form-group col-md-5">
        <label for="inputAddress2">Emergency Address</label>
        <input type="text" class="form-control" name="emergencyaddress" value="{{ old('emergencyaddress') ?? $employee->emergencyaddress}}" autocomplete="off">
    </div>
    <div class="form-group col-md-2">
        <label for="inputAddress2">Emergency Phone</label>
        <input type="text" class="form-control" name="emergencyphone" value="{{ old('emergencyphone') ?? $employee->emergencyphone}}" autocomplete="off">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputCity">Employment Date</label>
        <input type="date" class="form-control" name="employmentdate" value="{{ old('employmentdate') ?? $employee->employmentdate}}">
    </div>
    <div class="form-group col-md-3">
        <label for="inputState">Department</label>
        <select name="department_id"class="form-control" style="border-color:red">
            <option value="">Select ...</option>
            @foreach ($departments as $department)
                <option value="{{$department->id}}" {{ $department->id == $employee->department_id ? 'selected' : ''}}>{{$department->name}}</option>
            @endforeach              
        </select>
        <div class="text-danger">{{ $errors->first('department_id') ? 'Department field is required' : '' }}</div>
    </div>
    <div class="form-group col-md-3">
        <label for="inputState">Staff Category</label>
        <select name="category_id" class="form-control" style="border-color:red">
            <option value="" >Select ...</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category->id == $employee->category_id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach 
        </select>
        <div class="text-danger">{{ $errors->first('category_id') ? 'Staff category field is required' : '' }}</div>
    </div>
    <div class="form-group col-md-3">
        <label for="inputZip">Staff ID</label>
        <input type="text" class="form-control" name="staffid" value="{{ old('staffid') ?? $employee->staffid}}" autocomplete="off" style="border-color:red">
        <div class="text-danger">{{ $errors->first('staffid') }}</div>
    </div>
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    {{-- <input type="hidden" name="employee_id" value="{{$emp->id}}"> --}}
</div>