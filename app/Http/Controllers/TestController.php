<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\Session;
class TestController extends Controller{
    
//    用户登录界面
    
    public function index(Request $request){
        if($request->isMethod('post')){
          $user=$request->all();
//          $i=Test::where(['username'=>$user['user_name'],'password'=>$user['user_password']])->get();
//          dd(!$i->isEmpty());
//          if(Test::where(['username'=>$user['user_name'],'password'=>$user['user_password']])->get()){
//              echo 'haole';
//          }
        if(!Test::where('username','=',$user['user_name'])->where('password','=',$user['user_password'])->get()->isEmpty()){
            Session()->put('user',$user['user_name']);
            return Redirect('i_main');
        }
        else{
            echo '登录失败！';
        }
        }
        
        return view('Test/index');
    }
    
//    用户登录后主页面
    
    public function i_main(){
//        return Session()->get('user');
        if(Session()->has('user')){
            return view('Test/i_main');
        }
        else{
            return Redirect('login');
        }
    }
    
//    用户注销登录
    
    public function login_out(){
        Session()->flush();
        return Redirect('login');
    }
    
}