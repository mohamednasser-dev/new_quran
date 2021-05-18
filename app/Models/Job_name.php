<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_name extends Model
{
    protected $fillable = [
        'name_ar','name_en','deleted'
    ];

    protected $appends = ['name'];
    public function getNameAttribute()
    {
        if ($locale = \app()->getLocale() == "ar") {
            return $this->name_ar ;
        } else {
            return $this->name_en;
        }
    }
}
