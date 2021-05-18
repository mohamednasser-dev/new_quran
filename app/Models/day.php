<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class day extends Model
{
    protected $fillable = [
        'name_ar', 'name_en'
    ];

    public function Episode()
    {
        return $this->belongsToMany(Episode::class, 'episode_days', 'day_id', 'episode_id');
    }
}
