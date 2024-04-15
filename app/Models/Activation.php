<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $fillable = [
        'email',
        'token',
        'used',
    
    ];
    
    
    protected $dates = [
        'created_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/activations/'.$this->getKey());
    }
}
