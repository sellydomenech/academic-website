<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPasswordReset extends Model
{
    protected $fillable = [
        'email',
        'token',
    
    ];
    
    
    protected $dates = [
        'created_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/admin-password-resets/'.$this->getKey());
    }
}
