<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Session;

class BrandController extends Controller
{

    public $_panel;
    public function __construct()
    {
        $this->_panel = 'Brand';
    }
    public function index(){
        $informations = Brand::orderBy('order')->paginate(10);

        $_panel = $this->_panel;

        return view('admin.brands.index',
            compact('informations','_panel')
        );
    }

    public function create(){

        return view('admin.brands.create');
    }

    public function store(Request $request){
        $rules = [
            'title'=>'required',
            'status'=>'required',
            'order'=>'integer|required'
        ];

        $request->validate($rules);

        $information = new Brand();
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;


        $information->save();

        Session::flash('message', 'Brand created successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('brand.index');
    }

    public function show($id){

    }
    public function edit($id){

        $information = Brand::find($id);

        return view('admin.brands.edit',
        compact('information')
        );


    }
    public function update(Request $request,$id){

        $rules = [
            'title'=>'required',
            'status'=>'required',
            'order'=>'integer|required'
        ];

        $request->validate($rules);

        $information = Brand::find($id);
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;


        $information->save();

        Session::flash('message', 'Brand created successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('brand.index');

    }


    public function destroy($id){
        $information = Brand::find($id);

        // check if vehicle available for brand or not

        $vehicles = Vehicle::where('brand_id',$id)->get();

        if($vehicles->isEmpty()){
            $information->delete();
            Session::flash('message', 'Brand deleted successfully!');
            Session::flash('alert-class', 'alert-danger');

        }else{
            Session::flash('message', 'Cannot delete brand , because this brand is associated with some vehicles!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('brand.index');
    }
}
