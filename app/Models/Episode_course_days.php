<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode_course_days extends Model
{
    protected $fillable = [
        'episode_id', 'date', 'week_id','day_id','started_at','notify_at','send_status'
    ];
    public function Episode()
    {
        return $this->belongsTo(Episode::class, 'episode_id');
    }

    public function Day()
    {
        return $this->belongsTo(day::class, 'day_id');
    }
}
