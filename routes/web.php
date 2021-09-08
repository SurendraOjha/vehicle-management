<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('brand.index');
});


Route::resource('vehicle',VehicleController::class);

Route::resource('brand',BrandController::class);

Route::resource('category',CategoryController::class);

Route::resource('sub-category',SubCategoryController::class);


Route::get('get-sub-category/{id}',[VehicleController::class,'getSubCategory']);
