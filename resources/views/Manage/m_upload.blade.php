@extends('layout/layout')
@section('title')
上传文章
@stop

@section('head')
<p>当前管理员：<b>{{Session()->get('user')}}</b> 欢迎您的登录！<a href="{{url('m_login_out')}}">注销</a></p>
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
         <td><input type="reset"  value="重置"></td>
         <td><input type="submit"  value="提交"></td>
     </tr>
     
     </form>
 </table>
@stop
