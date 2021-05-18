<?php

namespace App\Models;

use App\Models\Plan\Plan_new;
use App\Models\Plan\Plan_revision;
use App\Models\Plan\Plan_tracomy;
use Illuminate\Database\Eloquent\Model;

class Plan_section_degree extends Model
{
    protected $fillable = [
        'student_id', 'section_id','plan_id','errors_num','degree','plan_type','type'
    ];
    public function Plan_new()
    {
        return $this->belongsTo(Plan_new::class, 'plan_id');
    }
    public function Plan_tracomy()
    {
        return $this->belongsTo(Plan_tracomy::class, 'plan_id');
    }
    public function Plan_revision()
    {
        return $this->belongsTo(Plan_revision::class, 'plan_id');
    }
    public function Ask_degree()
    {
        return $this->belongsTo(Far_learn_degree::class, 'degree');
    }

    public function Ask()
    {
        return $this->belongsTo(Student_Questions_episode::class, 'plan_id');
    }

}
