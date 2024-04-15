<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    protected $fillable = [
        'migration',
        'batch',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/migrations/'.$this->getKey());
    }
}
