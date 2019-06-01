<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $guarded = [];

    public function getTypeAttribute($attribute)
    {
        return $this->typeOptions()[$attribute];
        
    }
    

    public function typeOptions()
    {
        return [
            1 => 'Annual',
            2 => 'Casual',
            3 => 'Examination',
            4 => 'Sick',
            5 => 'Maternity',
            6 => 'Paternity'

        ];
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
        
    }
}
