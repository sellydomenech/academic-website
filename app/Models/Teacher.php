<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';

    protected $fillable = [
        'first_name',
        'last_name',
        'nik',
        'date_of_birth',
        'phone_number',
        'address',
        'email',
        'registration_date',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'date_of_birth',
        'registration_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/teachers/'.$this->getKey());
    }
}
