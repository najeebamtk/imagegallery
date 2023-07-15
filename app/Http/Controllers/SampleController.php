<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Category;
use App\Models\Image;


use Illuminate\Support\Facades\Hash;



class SampleController extends Controller
{
    function FnAdminLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $admin=Login::where('email',$email)->where('password',$password)->where('user_id',true)->first();
        if(is_null($admin)){

            return view('adminlogin',['message'=>'incorrect email or password']);
            
        }
        elseif($admin){
            $request->session()->put('loginid',$admin->id);
             return redirect('admindashboard');
        }
    }
    function FnAdminDashboard(){
        return view('admindashboard');
    }
    function FnAdminCategory(){
        $categories=Category::orderBy('created_at','DESC')->get();

        return view('category/categorylist',['categories'=>$categories]);
    }
    function FnAdminAddCategory(){
        return view('category/addcategory');
    }
    function FnAddCategory(Request $request){
        $category=$request->category;
        $obj=new Category([
           'name'=>$category,
        ]);
        $obj->save();
        return redirect('admindashboard');
     
    }
    function FnEditCategory($id){
        $editcategory=Category::where('id',$id)->first();
        return view('category/editcategory',['edit'=>$editcategory]);
    }
    function FnUpdateCategory($id,Request $request){
        $newcategory=$request->category;
        $updatecategory=Category::where('id',$id)->update([
            'name'=>$newcategory

        ]);
        return redirect('admin/category');
    }
    function FnDeleteCategory($id){
        Category::where('id',$id)->delete();
        return redirect('admin/category');


    }
    function FnImageUpload(){
        $categories=Category::all();
        return view('image/addimage',['categories'=>$categories]);

    }
    function FnImageAdd(Request $request){
        $categories=Category::all();
 
        $img="newlaravel".time().".".$request->image1->getClientOriginalExtension();
        $request->image1->storeAs('public/profile',$img);
        $category=$request->category;
        $imageobj=new Image([
           
            'category_id'=>$category,
            'image'=>$img
        ]);
        $obj=$imageobj->save();
        if($obj){
            $message="image added";
            return view('image/addimage',['message'=>$message,'categories'=>$categories]);
        }
        else{
            $message="error";
            return view('image/addimage',['message'=>$message,'categories'=>$categories]);
        }
    }
    function FnImageList(){
        $images = Image::join('categories', 'images.category_id', '=', 'categories.id')->
        select('images.*','categories.name')->get();

        return view('image/imagelist',['images'=>$images]);
    }
    function FnDeleteImage($id){
        Image::where('id',$id)->delete();
        return redirect('imagelist');
    }
    function FnLogin(){
        return view('userlogin');

    }
    function FnUserLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $user=Login::where('email',$email)->where('password',$password)->where('user_id',false)->first();
        if(is_null($user)){

            return view('userlogin',['message'=>'incorrect email or password']);
            
        }
        elseif($user){
            $request->session()->put('loginid',$user->id);
             return redirect('userdashboard');
        }
    }
    function FnUserDashboard(){
        $categories = Category::join('images', 'categories.id', '=', 'images.category_id')->OrderBy('categories.created_at','DESC')->
        select('categories.*','images.image')->get();
        return view('userdashboard',['categories'=>$categories]);
    }
    function FnAdminLogout(){
        session()->forget('loginid');
        session()->flush();
        return redirect('adminlogin');
    }
    function FnUserLogout(){
        session()->forget('loginid');
        session()->flush();
        return redirect('userlogin');
    }

    

}
    
