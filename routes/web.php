<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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
Route::get('adminlogin', function () {
    return view('adminlogin');
});
Route::post('adminlogin',[SampleController::class,'FnAdminLogin']);
Route::get('admindashboard',[SampleController::class,'FnAdminDashboard']);
Route::get('admin/category',[SampleController::class,'FnAdminCategory']);
Route::get('admin/addcategory',[SampleController::class,'FnAdminAddCategory']);
Route::post('admin/addcategory',[SampleController::class,'FnAddCategory']);
Route::get('admin/category/edit/{id}',[SampleController::class,'FnEditCategory']);
Route::post('admin/category/edit/{id}',[SampleController::class,'FnUpdateCategory']);
Route::get('admin/category/delete/{id}',[SampleController::class,'FnDeleteCategory']);

Route::get('admin/image',[SampleController::class,'FnImageUpload']);
Route::post('admin/addimage',[SampleController::class,'FnImageAdd']);
Route::get('imagelist',[SampleController::class,'FnImageList']);
Route::get('imagelist/delete/{id}',[SampleController::class,'FnDeleteImage']);



Route::get('userlogin',[SampleController::class,'FnLogin']);
Route::post('userlogin',[SampleController::class,'FnUserLogin']);
Route::get('userdashboard',[SampleController::class,'FnUserDashboard']);
Route::get('admin/logout',[SampleController::class,'FnAdminLogout']);
Route::get('user/logout',[SampleController::class,'FnUserLogout']);


