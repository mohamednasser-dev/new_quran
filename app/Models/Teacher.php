<?php

namespace App\Models;
use Alkoumi\LaravelHijriDate\Hijri;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $guard = 'teacher';
    protected $fillable = [
        'user_name', 'first_name_ar','job_name', 'is_new','mid_name_ar','last_name_ar','first_name_en','mid_name_en',
        'last_name_en','last_name_en','gender','email','password','main_lang','country','phone','image','status','country_code',
        'is_verified','code','epo_type','qualification','nationality','date_of_birth','ident_num','save_quran_num','i_pan','rate','member'
    ];

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/teachers') . '/' . $img;
        else
            return "";
    }


    protected $appends = ['hijri_date_of_birth','name'];
    public function getHijriDateOfBirthAttribute()
    {
        $year = \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('Y');
        $month = \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('m');
        $day = \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('d');
        $date = Hijri::DateFromGregorianDMY($day, $month, $year);
        return $date;

    }

    public function Episodes()
    {
        return $this->hasMany('App\Models\Episode','teacher_id', 'id');
    }

    public function Episode()
    {
        return $this->belongsToMany(Episode::class, 'episode_teachers', 'teacher_id', 'episode_id');
    }

    public function Qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification');
    }
    public function Nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality');
    }
    public function Country()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function Job()
    {
        return $this->belongsTo(Job_name::class, 'job_name');
    }

    public function getNameAttribute()
    {
        if ($locale = \app()->getLocale() == "ar") {
            return $this->first_name_ar ." ".$this->mid_name_ar." ".$this->last_name_ar;
        } else {
            return $this->first_name_en ." ".$this->mid_name_en." ".$this->last_name_en;
        }
    }
}
