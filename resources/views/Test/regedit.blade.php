@extends('layout/layout')

@section('title')
注册页面
@stop
@section('head')
<h1>填写相关信息完成注册</h1>
@stop

@section('content')
<table id="table_i">
     <form action="{{url('regedit')}}" method="post">
         
         {{csrf_field()}}
     <tr>
         <td>用户名：</td>
         <td><input type="text" name="user.username" value=""></td>
     </tr>
     <tr>
         <td>密码：</td>
         <td><input type="text" name="user.password" value=""></td>
     </tr>
     <tr>
         <td>性别：</td>
         <td><input type="text" name="user.sex" value=""></td>
     </tr>
     <tr>
         <td>QQ：</td>
         <td><input type="text" name="user.qq" value=""></td>
     </tr>
     
     
     <tr>
         <td><input type="reset"  value="重置" onclick="return confirm('确定要重置？\n   已遍写内容将被清空.');"></td>
         <td><input type="submit"  value="提交" onclick="return confirm('确定提交？');"></td>
     </tr>
     
     </form>
 </table>
@stop