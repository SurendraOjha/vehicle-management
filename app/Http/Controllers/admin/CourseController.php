<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseEditRequest;
use App\Http\Requests\CourseStoreRequest;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;

class CourseController extends Controller
{
    public $setting;
    public $_panel;
    public $base_route;

    public function __construct()
    {
        $this->setting = Setting::first();
        $this->_panel = $this->setting->courses;
        $this->base_route='course.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $informations = Course::orderBy('order')->paginate(10);

        $_panel = $this->_panel;
        $base_route = $this->base_route;
        $setting = Setting::first();
        return view('admin.courses.index',
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

        return view('admin.courses.create',
        compact('_panel','base_route','setting')
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {



        $information = new Course();
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

        return redirect()->route($this->base_route)->with('message','PDF for course is created successfully!');
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

        $information = Course::find($id);
        $setting = Setting::first();

        return view('admin.courses.edit',
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
    public function update(CourseEditRequest $request, $id)
    {

        $update_setting = updateSetting('courses',$request->courses);

        $information = Course::find($id);
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

        return redirect()->route($this->base_route)->with('message','Course Updated Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Course::find($id);

        $old_file = public_path().'uploads/'.$information->pdf;

            if(File::exists($old_file)){
                File::delete($old_file);
            }


        $information->delete();

        return redirect()->route($this->base_route)->with('message','Course Deleted Successfully!!');
    }

}
