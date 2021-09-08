<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Session;

class SubCategoryController extends Controller{
    public $_panel;
    public $base_route;
    public function __construct()
    {
        $this->_panel = 'Sub Category';
        $this->base_route ='sub-category.index';
    }
    public function index(){

        $informations = Category::whereNotNull('parent')->orderBy('order')->paginate(10);

        $categories = Category::whereNull('parent')->orderBy('order')->pluck('title','id');

        $_panel = $this->_panel;

        $base_route = $this->base_route;

        return view('admin.sub-categories.index',
            compact('informations','_panel','base_route','categories')
        );
    }



    public function store(Request $request){
        $rules = [
            'title'=>'required',
            'status'=>'required',
            'order'=>'integer|required',
            'parent'=>'required'
        ];

        $request->validate($rules);

        $information = new Category();
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;
        $information->parent = $request->parent;
        $information->save();

        Session::flash('message', 'Brand created successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route($this->base_route);
    }

    public function show($id){

    }
    public function edit($id){

        $information = Category::find($id);

        return view('admin.sub-categories.edit',
        compact('information')
        );


    }
    public function update(Request $request,$id){

        $rules = [
            'title'=>'required',
            'status'=>'required',
            'order'=>'integer|required',
            'parent'=>'required'
        ];

        $request->validate($rules);

        $information = Category::find($id);
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;
        $information->parent = $request->parent;
        $information->save();

        Session::flash('message', 'Category updated successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route($this->base_route);

    }


    public function destroy($id){
        $information = Category::find($id);

        // check if vehicle available for brand or not

        $vehicles = Vehicle::where('category_id',$id)->get();

        if($vehicles->isEmpty()){
            $information->delete();
            Session::flash('message', 'Category deleted successfully!');
            Session::flash('alert-class', 'alert-danger');

        }else{
            Session::flash('message', 'Cannot delete brand , because this category is associated with some vehicle!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route($this->base_route);
    }

}
