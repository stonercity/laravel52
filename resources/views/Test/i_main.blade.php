@extends('layout/layout')

@section('head')
                <p>当前用户：<b>{{Session()->get('user')}}</b> 欢迎您的登录！<a href="{{url('login_out')}}" onclick="return confirm('确定退出登录？');">注销</a></p>
@stop
@section('content')
<div id="all_list">
    <p align="left">我的文章:</p>
    <div id="c_list">
            @foreach($list as $m)
            
            <p  style="width:1000px;"><span style="text-align: left; width:500px;">标题：<a href="{{url('content',['id'=>$m->Id])}}">{{$m->title}}</a></span><span style="text-align: right;float: right; width:500px;">上传时间：{{$m->up_time}}</span></p>
            @endforeach
            {{$list->render()}}
    </div>
    <div>
        <p style="clear:both;padding:10px 0 0 0;"><a href="{{url('upload')}}">添加一篇新文章</a></p>
    </div>
</div>
@stop