<?php

namespace App\Http\Controllers\Dashboard;

use Gate;
use App\Models\Blog;
use Illuminate\Support\Str;
// use Illuminate\Contracts\Auth\Access\Gate;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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

        $result = $blog->paginate($pageSize);

        $count = $blog->count();

        return view('dashboard.blog.list', ['result'=>$result, 'pageSize'=>$pageSize, 'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = BlogCategory::all();
        return view('dashboard.blog.form', ['catagories'=>$catagories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(Gate::denies('add')){
        //     return redirect()->back()->with('error','Error Access denied');
        // }

        $request->validate([
            'title' => 'required|max:255'
        ]);

        $data = new Blog();

        if( $request->file('preview_image') ){

            $preview_image = $request->file('preview_image')->store('upload', 'public');
            $data->preview_image = $preview_image;
        }

        if( $request->file('detail_image') ){

            $detail_image = $request->file('detail_image')->store('upload', 'public');
            $data->detail_image = $detail_image;

            if( !$request->file('preview_image') ) {
                $data->preview_image = $request->file('detail_image')->store('upload', 'public');
            }
        }

        $active = 0;
        if($request->active){
            $active = 1;
        }

        if($request->alias){
            $data->alias = $request->alias;
        }else{
            $data->alias = Str::slug($request->title);
        }

        $data->created_by = auth()->user()->id;
        $data->category_id = $request->category_id;
        $data->sort = ( !empty($request->sort)? $request->sort: 500);
        $data->active = $active;
        $data->title = $request->title;
        $data->preview_text = $request->preview_text;
        $data->detail_text = $request->detail_text;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        $data->save();

        return redirect()->route('blog.index')->with('success', 'Blog added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $catagories = BlogCategory::all();
        return view('dashboard.blog.form', ['result'=>$blog, 'catagories'=>$catagories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $data = Blog::find($id);

        if( $request->file('preview_image') ){
            $preview_image = $request->file('preview_image')->store('upload', 'public');
            $data->preview_image = $preview_image;
        }

        if( !$request->file('preview_image') and $request->file('detail_image') ){
            $data->preview_image = $request->file('detail_image')->store('upload', 'public');
        }

        if( $request->file('detail_image') ){
            $detail_image = $request->file('detail_image')->store('upload', 'public');
            $data->detail_image = $detail_image;
        }

        $active = 0;
        if($request->active){
            $active = 1;
        }

        if($request->alias){
            $data->alias = $request->alias;
        }else{
            $data->alias = Str::slug($request->title);
        }

        $data->created_by = auth()->user()->id;
        $data->category_id = $request->category_id;
        $data->active = $active;
        $data->sort = $request->sort;
        $data->title = $request->title;
        $data->preview_text = $request->preview_text;
        $data->detail_text = $request->detail_text;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        $data->save();

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::find($id);
        $data->delete();
        return redirect()->route('blog.index');
    }
}
