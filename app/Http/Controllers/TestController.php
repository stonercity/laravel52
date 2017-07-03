<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Test;
use App\Content;
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
            $content=Content::all();
            return view('Test/i_main',['list'=>$content]);
        }
        else{
            return Redirect('login');
        }
    }
       
//    内容页面
    
    public function content($id){
        
        $detial=content::where('id','=',$id)->get();
        
        return view('Test/content',['detial'=>$detial]);
    }
    
//    更新数据
    
    public function update(Request $request,$id=null){
        
        if($request->isMethod('post')){
            return '123';
        }
        
        $update=content::where('id','=',$id)->get();
        
        return view('Test/update',['update'=>$update]);
    }
    
//    上传数据
    
     public function upload($id=null){
        return view('Test/upload');
    }
    
//    更新数据上传
    
       public function check(Request $request){
        
        if($request->isMethod('post')){
            $info=$request->all();
//            content::where('Id','=',)->get();
//            $user['user_name']
            
            //未完。。。
            $content=Content::find(11);
//                    where('Id','=',$info['content_id'])->get();
            $content->content=$info['content_content'];
//            $content->check_time=$info['content_time'];
            $content->sure=$info['content_sure'];
            $content->title=$info['content_title'];            
            if($content->save()){
                return Redirect('i_main');
            }
            
       }
       
        }
//    详细信息
//    public function detial($id){
//        return view('Test/content');
//    }
    
//    用户注销登录
    
    public function login_out(){
        Session()->flush();
        return Redirect('login');
    }
    
}