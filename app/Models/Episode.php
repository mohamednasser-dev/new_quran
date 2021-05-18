<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'name_ar', 'name_en','deleted','gender', 'level_id','subject_id',
        'subject_level_id', 'teacher_id','student_number','listen_type',
        'active','desc_ar','desc_en','time_from','time_to','student_link',
        'teacher_link','type','college_id','cost','start_date','teacher_view','academic_semesters_id',
        'end_date','week_id','day_id','meeting_id','topic','agenda','start_time','passcode','join_url'];
    public function Days()
    {
        return $this->belongsToMany(day::class, 'episode_days', 'episode_id', 'day_id');
    }
    public function Readings()
    {
        return $this->belongsToMany(Reading::class, 'episode_readings', 'episode_id', 'reading_id');
    }

    public function Students()
    {
        return $this->belongsToMany(Student::class, 'episode_students', 'episode_id', 'student_id')
            ->orderBy('order_num','asc');
    }

    public function Teaachers()
    {
        return $this->belongsToMany(Teacher::class, 'episode_teachers', 'episode_id', 'teacher_id');
    }

    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function Subject_level()
    {
        return $this->belongsTo(Subject_level::class, 'subject_level_id');
    }

    public function Teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function Mogmaa()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

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
