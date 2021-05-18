<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = [
        'name_ar', 'name_en'
    ];
    public function Episode()
    {
        return $this->belongsToMany(Episode::class, 'episode_days', 'reading_id', 'episode_id');
    }
}
