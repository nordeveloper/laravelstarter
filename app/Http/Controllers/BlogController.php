<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){

        $pageSize = 20;
        $sort = 'id';
        if(intval($request['pageSize'])>0){
            $pageSize = $request['pageSize'];
        }
    
        if( !empty($request['sort']) ){
            $sort = $request['sort'];
        }
    
        $blog = Blog::orderBy($sort, 'desc');
    
        if($request->get('id')>0){
            $blog->where('id','=',$request->get('id'));
        }

        // dump($request->slug);
        if( !empty($request->slug) ){
            $category = BlogCategory::where('slug','=',$request->slug)->first();
            $blog->where('category_id','=',$category->id);
        }
    
        $result = $blog->paginate($pageSize);
    
        $count = $blog->count();
    
        return view('site.blog.list', ['result'=>$result, 'pageSize'=>$pageSize, 'count'=>$count]);
    }

    public function detail($id)
    {
       $result = Blog::find($id);
       if($result){
          return view('site.blog.detail', ['result'=>$result]);
       }else{
           abort(404);
       }
       
    }

}
