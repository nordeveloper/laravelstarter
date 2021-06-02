<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class FilemanagerController extends AppController
{
    function index(){
        return view('dashboard.filemanager');
    }
}
