<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Session;

class VehicleController extends Controller
{
    public $_panel;
    public $base_route;
    public function __construct()
    {
        $this->_panel = 'Vehicle';
        $this->base_route = 'vehicle.index';
    }
    public function index(Request $request)
    {

        // dd('here');


        $brand_id =  $request->brand_id;
        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $price_from = $request->price_from;
        $price_to = $request->price_to;

        $informations = $this->filterData($request);



        // dd($informations);


        $search_categories = Category::whereNull('parent')->orderBy('order')->pluck('title', 'id');


        $categories = Category::whereNull('parent')->orderBy('order')->pluck('title', 'id');


        $brands = Brand::orderBy('order')->pluck('title', 'id');

        $_panel = $this->_panel;

        $base_route = $this->base_route;

        return view('admin.vehicles.index',
            compact('informations', '_panel', 'base_route', 'categories', 'brands', 'search_categories',

            'brand_id',
            'category_id',
            'sub_category_id',
            'price_from',
            'price_to'

            )
        );
    }



    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'status' => 'required',
            'order' => 'integer|required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'required'
        ];

        $request->validate($rules);

        $information = new Vehicle();
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;
        $information->brand_id = $request->brand_id;
        $information->category_id = $request->category_id;
        $information->sub_category_id = $request->sub_category_id;

        $information->price = $request->price;
        $information->save();

        Session::flash('message', 'Vehicle created successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route($this->base_route);
    }

    public function show($id)
    {
    }


    public function create()
    {

        $categories = Category::whereNull('parent')->orderBy('order')->pluck('title', 'id');


        $brands = Brand::orderBy('order')->pluck('title', 'id');

        $_panel = $this->_panel;

        $base_route = $this->base_route;

        return view('admin.vehicles.create',
            compact('categories', 'brands', '_panel', 'base_route')
        );
    }
    public function edit($id)
    {

        $information = Vehicle::find($id);

        return view(
            'admin.vehicle.edit',
            compact('information')
        );
    }
    public function update(Request $request, $id)
    {

        $rules = [
            'title' => 'required',
            'status' => 'required',
            'order' => 'integer|required',
            'parent' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ];

        $request->validate($rules);

        $information = Vehicle::find($id);
        $information->title = $request->title;
        $information->status = $request->status;
        $information->order = $request->order;
        $information->parent = $request->parent;
        $information->brand_id = $request->brand_id;
        $information->category_id = $request->category_id;
        $information->price = $request->price;
        $information->save();

        Session::flash('message', 'Vehicle updated successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route($this->base_route);
    }


    public function destroy($id)
    {
        $information = Vehicle::find($id);

        // check if vehicle available for brand or not

        $vehicles = Vehicle::where('category_id', $id)->get();

        $information->delete();
        Session::flash('message', 'Category deleted successfully!');
        Session::flash('alert-class', 'alert-danger');



        return redirect()->route($this->base_route);
    }


    // ajax call for sub categories

    public function getSubCategory($id)
    {
        $information = Category::where('parent', $id)->get();

        return response()->json($information);
    }


    public function filterData($request)
    {


        $brand_id =  $request->brand_id;
        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $price_from = $request->price_from;
        $price_to = $request->price_to;



        $informations = Vehicle::with('category')->with('brand');


        // if brand id is present

        if ($brand_id) {
            $informations = $informations->where('brand_id', $brand_id);
        }

        // if  category id is present

        if ($category_id) {
            $informations = $informations->where('category_id', $category_id);
        }

        // if sub category is present

        if ($sub_category_id) {
            $informations = $informations->where('sub_category_id', $sub_category_id);
        }

        // if price from is present

        if ($price_from) {


            $informations = $informations->where('price', '>=', $price_from);
        }


        // if price to is preset
        if ($price_to) {


            $informations = $informations->where('price', '<=', $price_to);
        }


        // $informations = $informations->join('categories as subcategories','subcategories.id','=','')

        $informations = $informations->orderBy('order')->get();


        return $informations;
    }
}
