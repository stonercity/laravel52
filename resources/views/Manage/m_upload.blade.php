@extends('layout/layout')
@section('title')
上传文章
@stop

@section('head')
<p>当前管理员：<b>{{Session()->get('admin')}}</b> 欢迎您的登录！<a href="{{url('m_login_out')}}" onclick="return confirm('确定退出登录？');">注销</a></p>
<p style='text-align: left;'><a href="{{url('m_main')}}">首页</a>》</p>
@stop
@section('content')
<table>
     <form action="{{url('m_upload')}}" method="post">
         
         {{csrf_field()}}
     <tr>
         <td>标题：</td>
         <td><input type="text" name="content.title" value=""></td>
     </tr>
     <tr>
         <td>内容：</td><td></td>
     </tr>
     
     <tr>
         <td></td>
         <td>
             <textarea cols="120" rows="5" name="content.content"></textarea>
         </td>
     <!--<input type="hidden" name="content.time" value="{{date("Y-m-d h:i:s")}}">-->      
     <input type="hidden" name="content.sure" value="1">
     </tr>
     <tr>
         <td><input type="reset"  value="重置" onclick="return confirm('确定重置？\n已经编写的内容将被清空！');"></td>
         <td><input type="submit"  value="提交" onclick="return confirm('确定提交？');"></td>
     </tr>
     
     </form>
 </table>
@stop
