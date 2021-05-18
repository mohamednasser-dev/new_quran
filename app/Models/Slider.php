<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image', 'title_ar','title_en','desc_ar','desc_en'
    ];

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/sliders') . '/' . $img;
        else
            return "";
    }
}
