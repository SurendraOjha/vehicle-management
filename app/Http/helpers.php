<?php

use App\Models\Setting;

function updateSetting($parameter,$value){

    $setting = Setting::first();
    $setting->$parameter =$value;

    $setting->save();

    return true;

}
