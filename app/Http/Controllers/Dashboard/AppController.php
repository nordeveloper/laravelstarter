<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class AppController extends BaseController
{

    protected $user;
    public $dashboardurl;

    public function __construct(){

        $this->dashboardurl = url('dashboard');

        $this->middleware(function ($request, $next) {

            if( Auth::check() and Auth::user()->isAdmin() ){

                $this->user = Auth::user();
            }else{

                return redirect('dashboard/auth');
            }

            return $next($request);

        });

    }

}
