<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Notifications\Notifiable;
use Alkoumi\LaravelHijriDate\Hijri;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';
    protected $fillable = [
        'user_name', 'first_name_ar', 'is_new', 'epo_type','mid_name_ar','last_name_ar',
        'first_name_en','mid_name_en','last_name_en','last_name_en','gender','email','password',
        'main_lang','country','phone','image','complete_data','status',
        'ident_num','nationality','qualification','save_quran_num','save_quran_limit','country_code','admin_view',
        'subject_id','subject_level_id','is_verified','code','interview','level_id','date_of_birth','district_id'
    ];
    public function Episode()
    {
        return $this->belongsToMany(Episode::class, 'episode_students', 'student_id', 'episode_id');
    }

    protected $appends = ['hijri_date_of_birth'];

    public function getHijriDateOfBirthAttribute()
    {
        $year = \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('Y');
        $month = \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('m');
        $day = \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('d');

        $date = Hijri::DateFromGregorianDMY($day, $month, $year);
        return $date;

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
}
