<?php

namespace App\Http\Controllers;

class TestController extends Controller{
    
//    主页页面渲染
    
    public function index(){
        return view('Test/index');
    }
}
