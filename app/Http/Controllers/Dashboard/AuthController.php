<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;

// use App\User;
use Illuminate\Http\Request;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    //use AuthenticatesUsers;

    function index(){

        if( !Auth::check() ){

            return view('dashboard.auth.login', ['errors'=>'']);

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
        
        $remember = false;
        if($request->$remember){
            $remember = true;
        }

        if ( Auth::attempt($credentials, $remember) ) {
            
            $user = User::find(Auth::id());
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();

            return redirect()->intended('dashboard');

        }else{

            return view('dashboard.auth.login', ['errors'=>'Invalid login or password']);
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
