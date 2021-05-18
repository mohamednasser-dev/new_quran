<?php

namespace App\Models\Plan;

use Illuminate\Database\Eloquent\Model;

class Plan_surah extends Model
{
    protected $fillable = [
        'name_ar', 'name_en','deleted','ayat_num'
    ];
}
