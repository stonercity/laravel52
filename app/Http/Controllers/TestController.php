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
 //    找回密码
    public function mima(Request $request){
        
        if($request->isMethod('post')){
            $user=$request->all();
            $dbinfo=Test::where('username','=',$user['user_username'])->where('sex','=',$user['user_sex'])->where('qq','=',$user['user_qq'])->get();
//            dd($dbinfo);
            
            if($dbinfo->isEmpty()){
                echo '<script language="javascript">alert("用户信息不正确，无法找回密码");location.href="'.url('mima').'"</script>';
            }
            else{
                
                echo '<script language="javascript">alert("请保管好您的密码！\n   您的密码为：'.$dbinfo[0]->password.'");location.href="'.url('login').'"</script>';
            }
        }
        return view('Test/mima');
    }
    
    
//    用户注册页面
    
    public function regedit(Request $request){
        if($request->isMethod('post')){
            $info=$request->all();
            if($info['user_username']==''||$info['user_password']==''||$info['user_password2']==''||$info['user_qq']==''){
                echo '<script language="javascript">alert("注册失败！\n  信息填写不完整。");location.href="'.url('regedit').'"</script>';
                }
            else{
    //            $this->validate($request,
    //                    ['user.username'=>'required','user_password'=>'required','user_password2'=>'required','user_sex'=>'required','user_qq'=>'required|integer'],
    //                    ['required'=>'必填','integer'=>'应为数字'],
    //                    ['user.username'=>'用户名','password'=>'密码','password2'=>'密码','sex'=>'性别','user_qq'=>'QQ']);
                $same=DB::table('user')->where('username','=',$info['user_username'])->get();
                if($same!=null){
                    return Redirect('regedit')->with('same','用户名已存在。');
                }
                else{
                    if($info['user_password']==$info['user_password2'])
                        {
                            DB::table('user')->insert(['username'=>$info['user_username'],'password'=>$info['user_password'],'sex'=>$info['user_sex'],'qq'=>$info['user_qq']]);

                            return Redirect('i_main')->with('rege','注册成功！');
                        }
                    else{
                            return Redirect('regedit')->with('no','两次密码不同！');
                    }
                }
            }
         }
         else{
             if(Session()->has('no'))
                {
                    echo '<script language="javascript">alert("注册失败！\n  两次密码不相同。");location.href="'.url('regedit').'"</script>';
                }
            else{
                if(Session()->has('same'))
                {
                    echo '<script language="javascript">alert("注册失败！\n  用户名已存在。");location.href="'.url('regedit').'"</script>';
                }
                else{
                    return view('Test/regedit');
                }
            }
            
         }
    }
    

//    用户登录后主页面
    
    public function i_main(){
        
        if(Session()->has('result'))
        {
            echo '<script language="javascript">alert("登录失败!\n用户名或密码错误！");location.href="'.url('i_main').'"</script>';
        }
        
        else{
                if(Session()->has('rege'))
                {
                    echo '<script language="javascript">alert("注册成功！\n      将自动跳转到登录页面。");location.href="'.url('i_main').'"</script>';
                }
                else
                {
                    if(Session()->has('user')){
                        $content=Content::where('user','=',Session()->get('user'))->where('sure','=',1)->orderBy('up_time','desc')->paginate(5);
                        return view('Test/i_main',['list'=>$content]);
                    }
                    else{
                        return Redirect('login');
                    }
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
                    ->update(['sure'=>2,'updated_at'=>date('Y-m-d H:i:sa',time()+8*60*60)]);
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