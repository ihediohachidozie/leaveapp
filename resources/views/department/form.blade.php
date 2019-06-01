@csrf
<div class="form-group py-1">                                        
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $department->name }}" autocomplete="off">            
    <div class="text-danger">{{ $errors->first('name') }}</div>
</div>