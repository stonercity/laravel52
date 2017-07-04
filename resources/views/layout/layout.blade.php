<html>
            <head>
                <title>
                    @section('title')
                    首页
                    @show
                </title>
                <link href="{{asset('css/index.css')}}" type="text/css" rel="stylesheet">
            </head>
    <body> 
        <div id="all">
            <div id="head">
                @section('head')
                <p>当前用户：<b>{{Session()->get('user')}}</b> 欢迎您的登录！<a href="{{url('login_out')}}">注销</a></p>
                <p style='text-align: left;'><a href="{{url('i_main')}}">首页</a>》</p>
                @show
                <hr>
            </div>
            <div id="content"> 
                @section('content')
                
                @show
            </div>
            <div id="foot">
                <hr>
                @section('foot')
                <p >Made by feng @2017 。</p>
                @show
            </div>
            
        </div>
       
    </body>
</html>
