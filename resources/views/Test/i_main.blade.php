@extends('layout/layout')
@section('head')
<p>当前用户：{{Session()->get('user')}} 欢迎您的登录！<a href="{{url('login_out')}}">注销</a></p>
@stop
@section('content')
<div id="list">
    <ul style="width:100px;">
        <li>我的文章</li>
    <li>写文章</li>
</ul>
</div>
<div id="detial">
    
</div>

@stop