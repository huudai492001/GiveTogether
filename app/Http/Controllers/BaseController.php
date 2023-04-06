<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('index');
    }
    public function event(){
        return view('event');
    }
    public function about(){
        return view('about');
    }
    public function causes(){
        return view('causes');
    }
    public function blog(){
        return view('blog');
    }
    public function detail_page(){
        return view('detail_page');
    }
    public function service(){
        return view('service');
    }
    public function team(){
        return view('team');
    }
    public function donate(){
        return view('donate');
    }
    public function volunteer(){
        return view('volunteer');
    }
}
