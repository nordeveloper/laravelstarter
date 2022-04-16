<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = BlogCategory::all();
        return view('dashboard.blogcategory.list', ['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.blogcategory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new BlogCategory();

        $formData = $request->input();
        if(empty($request->sort)){
            $formData['sort'] = 500;  
        }

        if( !empty($request->slug) ){
            $formData['slug'] = $request->slug;
        }else{
            $formData['slug'] = Str::slug($request->title);
        }

        $model->fill($formData);

        $model->save();

        return redirect()->route('blogcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = BlogCategory::find($id);
        return view('dashboard.blogcategory.edit',['result'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = BlogCategory::find($id);

        $formData = $request->input();

        if( !empty($request->slug) ){
            $formData['slug'] = $request->slug;
        }else{
            $formData['slug'] = Str::slug($request->title);
        }

        $model->fill($formData);

        $model->save();

        return redirect()->route('blogcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BlogCategory::find($id);
        $data->delete();
        return redirect()->route('blogcategory.index');
    }
}
