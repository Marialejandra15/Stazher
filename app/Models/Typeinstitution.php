<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeinstitution extends Model
{
    protected $fillable = [
        'typeinstitution',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/typeinstitutions/'.$this->getKey());
    }
}
