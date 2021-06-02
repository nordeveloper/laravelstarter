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

//    use AuthenticatesUsers;
    // protected $redirectTo = RouteServiceProvider::DASHBOARD;

    function index(){

        // if( Auth::check() ){

        //     if( !Auth::user()->isAdmin() ){
        //         return view('dashboard.auth.login');
        //     }

        // }else{

        //     if( !Auth::check() ){
        //         return view('dashboard.auth.login');
        //     }
        // }

        return view('dashboard.auth.login');
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


//    protected function attemptLogin(Request $request)
//    {
//        return $this->guard()->attempt(
//            $this->credentials($request), $request->filled('remember')
//        );
//    }

}
