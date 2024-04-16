<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportHasMark extends Model
{
    protected $fillable = [
        'raport_id',
        'subject_id',
        'mark',
        'note',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/raport-has-marks/'.$this->getKey());
    }
}
