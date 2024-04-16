<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    protected $table = 'class_group';

    protected $fillable = [
        'class_name',
        'start_date',
        'end_date',
        'semester',
        'year_of_study',
        'teacher_id',
    
    ];
    
    
    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/class-groups/'.$this->getKey());
    }
}
