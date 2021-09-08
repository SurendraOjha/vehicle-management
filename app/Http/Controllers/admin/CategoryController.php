<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public $_panel;
    public $base_route;
    public function __construct()
    {
        $this->_panel = 'Category';
        $this->base_route ='category.index';
    }
    public function index(){

        $informations = Category::orderBy('order')->paginate(10);

        $_panel = $this->_panel;

        $base_route = $this->base_route;

        return view('admin.categories.index',
            compact('informations','_panel','base_route')
        );
    }



    public function store(Request $request){
        $rules = [
            'title'=>'required',
            'status'=>'required',
            'order'=>'integer|required'
        ];

        $request->validate($rules);

        $information = new Category();
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;


        $information->save();

        Session::flash('message', 'Brand created successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route($this->base_route);
    }

    public function show($id){

    }
    public function edit($id){

        $information = Category::find($id);

        return view('admin.categories.edit',
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

        $information = Category::find($id);
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;


        $information->save();

        Session::flash('message', 'Category updated successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route($this->base_route);

    }


    public function destroy($id){
        $information = Category::find($id);

        // check if vehicle available for brand or not

        $sub_categories = Category::where('parent',$id)->get();

        if($sub_categories->isEmpty()){
            $information->delete();
            Session::flash('message', 'Category deleted successfully!');
            Session::flash('alert-class', 'alert-danger');

        }else{
            Session::flash('message', 'Cannot delete brand , because this categirt is associated with sub categories!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route($this->base_route);
    }
}
