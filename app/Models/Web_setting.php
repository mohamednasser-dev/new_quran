<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Web_setting extends Model
{
    protected $fillable = [
        'title_ar','title_en', 'phone', 'email','logo_ar','logo_en','color','color_side_bar','admin_logo_ar','admin_logo_en','address_ar','address_en','facebook','twiter','youtube','linked_in','insta'
    ];

    public function getLogo_arAttribute($img){
        if ($img)
            return asset('/uploads/logo') . '/' . $img;
        else
            return "";
    }
    public function getLogo_enAttribute($img){
        if ($img)
            return asset('/uploads/logo') . '/' . $img;
        else
            return "";
    }
}
