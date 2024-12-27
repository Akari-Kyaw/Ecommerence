<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Message;
use Auth;


class UserController extends Controller
{
    public function login(){
        return view('ecommerce.login');
    }
    public function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
       $user= User::where(['email'=>$request->email])->first();
       if($user){
            $result=$request->only('email','password'); 
                if(Auth::attempt($result)){
                        session()->put('user',$user);
                        $products =Product::latest()->limit(4)->get();
                        return view('ecommerce.index',['newproducts'=>$products]);
                        }
        return back()->withErrors(['errors'=>'Email and Password are not match']);

        }
        return back()->withErrors(['errors'=>'Email does not exit']);
    }

    public function register(){
        return view('ecommerce.register');
    }
    public function registerPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
          $user=  User::create($data);
          if($user){
            return view('ecommerce.login');

        }
        else
        return back()->withErrors(['errors'=>'Register Fail.Please Try Again']);
    }
    public function orderList(){
        return view('ecommerce.order');
    }
    public function orderCurrent(){
        return view('ecommerce.currentorder');
    }
    public function contactMessage(){
        if(session()->has('user'))
        return view('ecommerce.contactus');
        else
        return redirect('ecommerce/login');
    } 
    public function logout(){
        session()->forget("user");
        return view('ecommerce.login');
    }
    public function saveMessage(Request $request){
        $data=new Message();
        $data->user_id=session()->get('user')->id;
        $data->msg=$request->msg;
        $data->save();
        return back()->withErrors(['errors'=>'Your Message Has Been Sent']);
    }


}
