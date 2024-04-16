<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassHasSubject extends Model
{
    protected $fillable = [
        'class_group_id',
        'subject_id',
        'day',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/class-has-subjects/'.$this->getKey());
    }
}
