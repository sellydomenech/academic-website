<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    protected $table = 'raport';

    protected $fillable = [
        'student_id',
        'class_group_id',
        'given_in',
        'signed_at',
        'published',
        'moral_religious',
        'social_emotion',
        'speaking',
        'cognitive',
        'physical',
        'art',
        'sick',
        'permission',
        'absence',
        'note',
    
    ];
    
    
    protected $dates = [
        'signed_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/raports/'.$this->getKey());
    }
}
