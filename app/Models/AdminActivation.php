<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivation extends Model
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
        return url('/admin/admin-activations/'.$this->getKey());
    }
}
