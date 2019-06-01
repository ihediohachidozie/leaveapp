@csrf
<div class="form-group py-1">
    <label for="">Category Name</label>                                        
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}" autocomplete="off">            
    <div class="text-danger">{{ $errors->first('name') }}</div>
</div>
<div class="form-group py-1">
    <label for="">Days Approved</label>                                        
    <input type="number" name="days" class="form-control" max="30" min="1" value="{{ old('days') ?? $category->days }}">            
    <div class="text-danger">{{ $errors->first('days') }}</div>
</div>