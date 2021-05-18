<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name_ar', 'name_en','desc_ar','desc_en','deleted','level_id','amount_num'
    ];
    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
