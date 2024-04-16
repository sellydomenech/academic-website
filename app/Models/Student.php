<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = [
        'first_name',
        'last_name',
        'nick_name',
        'registration_number',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'address',
        'email',
        'status',
        'child',
        'number_of_children',
        'father_name',
        'father_occupation',
        'father_phone_number',
        'mother_name',
        'mother_occupation',
        'mother_phone_number',
        'family_address',
        'emergency_contact_name',
        'emergency_contact_occupation',
        'emergency_contact_phone_number',
        'emergency_contact_address',
        'registration_date',
        'start_date',
        'end_date',
        'class_id',
        'login_id',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'date_of_birth',
        'registration_date',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/students/'.$this->getKey());
    }
}
