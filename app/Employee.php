<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $guarded = [];


    public function getMaritalAttribute($attribute)
    {
        return $this->maritalOptions()[$attribute];
        
    }
    

    public function maritalOptions()
    {
        return [
            1 => 'Single',
            2 => 'Married',
            3 => 'Widowed',
            4 => 'Divorced',
            5 => 'Seperated'

        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class);  
    }

    public function category()
    {
        return $this->belongsTo(Category::class);  
    }

    public function user()
    {
        return $this->belongsTo(User::class);  
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);  
    }
}
