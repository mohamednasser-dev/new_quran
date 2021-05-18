<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    protected $fillable = ['student_id','teacher_id','readed','type','message_type' , 'title_ar', 'title_en','message_ar','message_en'];

    public function Student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }

    public function Teacher()
    {
        return $this->hasOne('App\Models\Teacher', 'id', 'teacher_id');
    }

    protected $appends = ['title','message'];

    public function getTitleAttribute()
    {
        if ($locale = app()->getLocale() == "ar") {
            return $this->title_ar;
        } else {
            return $this->title_en;
        }
    }

    public function getMessageAttribute()
    {
        if ($locale = app()->getLocale() == "ar") {
            return $this->message_ar;
        } else {
            return $this->message_en;
        }
    }
}
