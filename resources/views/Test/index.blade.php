@extends('layout/layout')
<!--@section('title')
@stop-->
@section('content')
<table border='1'>
<form actio="{{url('gui')}}" method="post">
    {{csrf_field()}}
        <tr>
            <td colspan="2" align='center'>Login</td>
        </tr>
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="user.name" value="用户名"></td>
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