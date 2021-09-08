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

        $emailData['text'] = 'test data';

        Mail::to('info@webix.am')->send(new MeilSend('emails.test', $emailData));

        return view('dashboard.index', ['result'=>$result]);
    }
}
