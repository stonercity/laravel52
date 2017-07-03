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
                <h1>This is a test.</h1>
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
