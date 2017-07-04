<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Test;
use App\Content;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class TestController extends Controller{
    
//    用户登录界面
    
    public function index(Request $request){
        if($request->isMethod('post')){
          $user=$request->all();
          
        if(!Test::where('username','=',$user['user_name'])->where('password','=',$user['user_password'])->get()->isEmpty()){
            Session()->put('user',$user['user_name']);
//            return 'io';
            return Redirect('i_main');
        }
        else{
            return Redirect('i_main')->with('result','登录失败！');
        }
        }
        
        return view('Test/index');
    }
    
//    用户登录后主页面
    
    public function i_main(){
        
        if(Session()->has('result'))
        {
            echo '<script language="javascript">alert("登录失败!\n用户名或密码错误！");location.href="'.url('i_main').'"</script>';
        }
        else{
        if(Session()->has('user')){
            $content=Content::where('user','=',Session()->get('user'))->where('sure','=',1)->get();
            return view('Test/i_main',['list'=>$content]);
        }
        else{
            return Redirect('login');
        }
        }
    }
       
//    内容页面
    
    public function content($id){
        
        $detial=content::where('id','=',$id)->get();
        
        return view('Test/content',['detial'=>$detial]);
    }
    
//    更新数据
    
    public function update(Request $request,$id=null){
        
        $update=content::where('id','=',$id)->get();
        
        return view('Test/update',['update'=>$update]);
    }
    
//    上传数据
    
     public function upload(Request $request){

         if($request->isMethod('post')){
            $info=$request->all();
//            content::where('Id','=',)->get();
//            $user['user_name']
            DB::table('content')->insert(['user'=>Session()->get('user'),'content'=>$info['content_content'],'sure'=>$info['content_sure'],'title'=>$info['content_title'],'up_time'=>date('Y-m-d H:i:sa',time()+8*60*60),'updated_at'=>date('Y-m-d H:i:s',time()+8*60*60)]);
         
            return Redirect('i_main');
         }
         
         return view('Test/upload');
    }
    
//    删除
    public function delete($id){
        
            DB::table('content')
                    ->where('id', $id)
                    ->update(['sure'=>2]);
            return Redirect('i_main');
    
    }
//    更新数据上传
    
       public function check(Request $request){
        
        if($request->isMethod('post')){
            $info=$request->all();
//            content::where('Id','=',)->get();
//            $user['user_name']
            DB::table('content')
                    ->where('id', $info['content_id'])
                    ->update(['content'=>$info['content_content'],'sure'=>$info['content_sure'],'title'=>$info['content_title'],'updated_at'=>date('Y-m-d H:i:sa',time()+8*60*60)]);
            //未完模型。。。
//            $content=Content::find(11);
//                    where('Id','=',$info['content_id'])->get();
//            $content->content=$info['content_content'];
//            $content->check_time=$info['content_time'];
//            $content->sure=$info['content_sure'];
//            $content->title=$info['content_title'];            
//            if($content->save()){
                return Redirect('i_main');
//            }
            
       }
       
        }
//    详细信息
//    public function detial($id){
//        return view('Test/content');
//    }
    
//    用户注销登录
    
    public function login_out(){
        Session()->forget('user');
        return Redirect('login');
    }
    
}