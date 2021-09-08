<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

// use App\User;
use Illuminate\Http\Request;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    //use AuthenticatesUsers;

    function index(){

        if( !Auth::check() ){

            return view('dashboard.auth.login');

        }else{

            return redirect('/dashboard');
        }
    }


    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|string',
           'password' => 'required|string',
        ]);   

        $credentials = $request->only('email', 'password');        

        if (Auth::attempt($credentials)) {
           return redirect()->intended('dashboard');
        }

        // $this->guard()->attempt(
        //     $this->credentials($request), $request->filled('remember')
        // );
    }

    public function resetpassword()
    {
        return view('dashboard.auth.resetpassword');
    }

    public function passrowdreset(Request $request){
        
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'password_confirm'=>'required|string'
        ]); 

        return "OK";
    }

}
