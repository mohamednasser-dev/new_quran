<?php

if (!function_exists('settings')){
    function settings(){
        return   App\Models\Web_setting::orderBy('id','desc')->first();
    }
}
