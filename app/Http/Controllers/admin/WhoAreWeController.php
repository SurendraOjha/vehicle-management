<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhoAreWeEditRequest;
use App\Http\Requests\WhoAreWeStoreRequest;
use App\Models\Setting;
use App\Models\WhoAreWe;
use Illuminate\Http\Request;
use File;

class WhoAreWeController extends Controller
{
    public $setting;
    public $_panel;
    public $base_route;

    public function __construct()
    {
        $this->setting= Setting::first();
        $this->_panel = $this->setting->who_are_we;
        $this->base_route='who-are-we.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $informations = WhoAreWe::orderBy('order')->paginate(10);

        $_panel = $this->_panel;
        $base_route = $this->base_route;
        $setting = Setting::first();
        return view('admin.who-are-we.index',
            compact('informations','_panel','base_route','setting')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $_panel = $this->_panel;
        $base_route = $this->base_route;
        $setting = Setting::first();

        return view('admin.who-are-we.create',
        compact('_panel','base_route','setting')
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WhoAreWeStoreRequest $request)
    {


        $information = new WhoAreWe();
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;


         // photo

         if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $pdf = time().'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/uploads');
            $file->move($destination_path,$pdf);

            $information->pdf = $pdf;
        }

        $information->save();

        return redirect()->route($this->base_route)->with('message','PDF for who are we is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $_panel = $this->_panel;
        $base_route = $this->base_route;

        $information = WhoAreWe::find($id);
        $setting = Setting::first();

        return view('admin.who-are-we.edit',
        compact('_panel','base_route','setting','information')
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WhoAreWeEditRequest $request, $id)
    {

        $update_setting =  updateSetting('who_are_we',$request->who_are_we);

        $information = WhoAreWe::find($id);
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;


         // photo


         if($request->hasFile('pdf')){


            $old_file = public_path().'uploads/'.$information->pdf;

            if(File::exists($old_file)){
                File::delete($old_file);
            }

            $file = $request->file('pdf');
            $pdf = time().'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/uploads');
            $file->move($destination_path,$pdf);

            $information->pdf = $pdf;
        }

        $information->save();

        return redirect()->route($this->base_route)->with('message','Who Are We Updated Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = WhoAreWe::find($id);

        $old_file = public_path().'uploads/'.$information->pdf;

            if(File::exists($old_file)){
                File::delete($old_file);
            }


        $information->delete();

        return redirect()->route($this->base_route)->with('message','Who Are We Deleted Successfully!!');
    }

}
