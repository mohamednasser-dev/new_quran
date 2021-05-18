<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [
        'name_ar', 'name_en','type'
    ];

//    public function Mogmaat($id)
//    {
//        return $this->hasMany('App\Models\Episode','college_id')->where('deleted','0')->where('college_id',$id);
//    }

    public function Mogmaat()
    {
        return $this->hasMany('App\Models\Episode','college_id', 'id')->where('deleted','0');
    }
}
