<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()

    {
//        $this->middleware('auth');
//        $this->middleware('admin');
    }
    public function dashboard(){
        return view('dashboard.admin');
    }
    public function category(){
        return view('dashboard.dashboardCategories.index');
    }
}
