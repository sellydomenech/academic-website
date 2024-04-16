<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHasClass extends Model
{
    protected $fillable = [
        'student_id',
        'class_group_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/student-has-classes/'.$this->getKey());
    }
}
