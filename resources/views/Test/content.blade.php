@extends('layout/layout')

@section('title')
编写新文章
@stop

@section('head')
<p>当前用户：<b>{{Session()->get('user')}}</b> 欢迎您的登录！<a href="{{url('login_out')}}">注销</a></p>
@stop

@section('content')
 @foreach($detial as $i)
 <div style="text-align: center;">标题为：<b>{{$i->title}}</b></div>
 <div><p style="text-align: left;">内容为：</p>{{$i->content}}</div>
 <div><p><a href="{{url('update',['id'=>$i->Id])}}">修改文章</a></p></div>
    @endforeach
@stop

@section('foot')
@stop
