<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public $_panel;

    public $base_route;



    public function __construct()
    {
        $this->_panel="Setting";
        $this->base_route='setting.index';
    }
    
    public function index(){

        $information = Setting::first();
        $_panel = $this->_panel;
        $base_route = $this->base_route;

        return view('admin.settings.index',
            compact('information','_panel','base_route')
        );

    }

    public function update(SettingRequest $request){
        $information = Setting::first();

        $information->system_name = $request->system_name;
        $information->about_us = $request->about_us;
        $information->save();


        return redirect()->route('setting.index')->with('message','Settings Updated Successfully!');


    }
}
