@extends('layout/layout')

@section('title')
文章审查
@stop

@section('head')
<p>当前管理员：<b>{{Session()->get('admin')}}</b> 欢迎您的登录！<a href="{{url('m_login_out')}}"  onclick="return confirm('确定退出登录？');">注销</a></p>
<p style='text-align: left;'><a href="{{url('m_main')}}">首页</a>》</p>
@stop

@section('content')

 @foreach($detial as $i)
 <div style="text-align: center;">标题为：<b>{{$i->title}}</b></div>
 <div><p style="text-align: left;">内容为：</p>{{$i->content}}</div>
 <div><p><a href="{{url('m_ok',['id'=>$i->Id])}}" onclick="return confirm('确定通过本文章的审查？');">通过文章</a></p></div>
    @endforeach
@stop