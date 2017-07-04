@extends('layout/layout')

@section('title')
更改信息
@stop

@section('head')
<p>当前管理员：<b>{{Session()->get('admin')}}</b> 欢迎您的登录！<a href="{{url('m_login_out')}}">注销</a></p>
<p style='text-align: left;'><a href="{{url('m_main')}}">首页</a>》</p>
@stop

@section('content')

 @foreach($update as $i)
 <table>
     <form action="{{url('m_check')}}" method="post">
         
         {{csrf_field()}}
     <tr>
         <td>标题：</td>
         <td><input type="text" name="content.title" value="{{$i->title}}"></td>
     </tr>
     <tr>
         <td>内容：</td><td></td>
     </tr>
     
     <tr>
         <td></td>
         <td>
             <textarea cols="120" rows="5" name="content.content">{{$i->content}}</textarea>
         </td>
     <input type="hidden" name="content.id" value="{{$i->Id}}">
     <!--<input type="hidden" name="content.time" value="{{date("Y-m-d h:i:s")}}">-->      
     <input type="hidden" name="content.sure" value="1">
     </tr>
     <tr>
         <td><input type="reset"  value="重置"></td>
         <td><input type="submit"  value="提交"></td>
     </tr>
     
     </form>
 </table>
 @endforeach
@stop

