@extends('layout/layout')

@section('title')
注册页面
@stop
@section('head')
<p><h1>填写相关信息完成注册</h1></p>
<p style='text-align: left;'><a href="{{url('i_main')}}">首页</a>》</p>
@stop

@section('content')
<table id="table_i">
     <form action="{{url('regedit')}}" method="post">
         
         {{csrf_field()}}
      
     <tr>
         <td>用 户 名：</td>
         <td><input type="text" name="user.username" value=""></td>
         
     </tr>
     <tr>
         <td>密    码：</td>
         <td><input type="password" name="user.password" value=""></td>
     </tr>
     <tr>
         <td>确认密码：</td>
         <td><input type="password" name="user.password2" value=""></td>
     </tr>
     <tr>
         <td>性    别：</td>
         <td><input type="radio" checked="true" name="user.sex" value="1">男<input type="radio" name="user.sex" value="0">女</td>
     </tr>
     <tr>
         <td>  QQ   ：</td>
         <td><input type="text" name="user.qq" value=""></td>
     </tr>
     
     
     <tr>
         <td><input type="reset"  value="重置"></td>
         <td><input type="submit"  value="提交" onclick="return confirm('确定提交？');"></td>
     </tr>
     
     </form>
 </table>
@stop