@extends('layout/layout')

@section('title')
编写新文章
@stop



@section('content')
 @foreach($detial as $i)
 <div style="text-align: center;">标题为：<b>{{$i->title}}</b></div>
 <div><p style="text-align: left;">内容为：</p>{{$i->content}}</div>
 <div><p><a href="{{url('update',['id'=>$i->Id])}}">修改文章</a>            <a href="{{url('delete',['id'=>$i->Id])}}" onclick="return confirm('确定要删除本文章吗？');">删除文章</a></p></div>
    @endforeach
@stop

