<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WysiwygMedia extends Model
{
    protected $fillable = [
        'file_path',
        'wysiwygable_id',
        'wysiwygable_type',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/wysiwyg-media/'.$this->getKey());
    }
}
