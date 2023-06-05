<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;

use App\Mail\MeilSend;
use Illuminate\Support\Facades\Mail;

//use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class IndexController extends AppController
{
    function index(){

        $result['users_count'] = User::count();

        return view('dashboard.index', compact('result'));
    }
}
