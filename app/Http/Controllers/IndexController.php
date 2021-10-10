<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $result = Blog::all();

        return view('site.home', ['result'=>$result]);
    }

    public function detail($id){

        $result = Blog::find($id);

        return view('site.blog-list', ['result'=>$result]);
    }
}
