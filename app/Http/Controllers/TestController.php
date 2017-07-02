<?php

namespace App\Http\Controllers;

class TestController extends Controller{
    
//    主页
    
    public function index(){
        return view('Test/index');
    }
}
