@extends('layout/layout')
@section('title')
管理员登录页面
@stop
@section('head')
<h1>管理员登录页面！</h1>
@stop
@section('content')
<table id="table_i">
<form action="{{url('m_login')}}" method="post">
    {{csrf_field()}}
        <tr>
            <td colspan="2" align='center'>Login</td>
        </tr>
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="user.name" value=""></td>
        </tr>
        <tr>
            <td>密  码：</td>
            <td><input type="password" name="user.password" value=""></td>
        </tr>
        <tr>
            <td><input type="reset" value="重置"></td>
            <td><input type="submit" value="登录"></td>
        </tr>
    </form>
</table>
@stop
@section('foot')
<p >Made by feng @2017 。</p>
@stop