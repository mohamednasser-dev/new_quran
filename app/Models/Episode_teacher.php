<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode_teacher extends Model
{
    protected $fillable = [
        'episode_id','teacher_id'
    ];
    public function Episode()
    {
        return $this->belongsTo(Episode::class, 'episode_id');
    }

    public function Student()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
