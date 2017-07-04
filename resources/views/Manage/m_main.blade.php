@extends('layout/layout')
@section('head')
<p>当前管理员：<b>{{Session()->get('user')}}</b> 欢迎您的登录！<a href="{{url('m_login_out')}}">注销</a></p>
@stop
@section('content')
<div id="all_list">
    <p align="left">所有文章:</p>
    <div id="c_list">
            @foreach($list as $m)
            
            <p><span style="text-align: left; width:300px;">作者：{{$m->user}}  
                </span><span style="text-align: right; width:300px;margin:0 0 0 300px;">标题：<a href="{{$m->sure==0 ? url('m_access',['id'=>$m->Id]) :url('m_content',['id'=>$m->Id])}}">{{$m->title}}</a></span>
                <span style="text-align: right;float: right; width:300px;">{{$m->sure==0 ? '待审查':$m->up_time}}</span>
            </p>
            @endforeach
    </div>
    <div>
        <p><a href="{{url('m_upload')}}">添加一篇新文章</a></p>
    </div>
</div>
@stop