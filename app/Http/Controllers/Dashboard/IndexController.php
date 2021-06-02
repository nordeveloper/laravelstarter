<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class IndexController extends AppController
{
    function index(){
        return view('dashboard.index');
    }
}
