<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class PagesController extends Controller
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

        $dbres = Page::orderBy($sort, 'desc');

        if($request->get('id')>0){
            $dbres->where('id','=',$request->get('id'));
        }

        $result = $dbres->paginate($pageSize);

        $count = $dbres->count();

        return view('dashboard.page.list', ['result'=>$result, 'pageSize'=>$pageSize, 'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.page.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        
        $data = new Page();

        if( !empty($request->active) ){
            $data->active = 1;
        }else{
            $data->active = 0;
        }

        if( $request->file('image') ){
            $img = $request->file('image')->store('upload', 'public');
            $data->image = "/".$img;
        }        

        $data->created_by = auth()->user()->id;
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->text = $request->text;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;

        $data->save();
        return redirect()->route('pages.index');
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
    public function edit(Page $page)
    {
        return view('dashboard.page.edit', ['result'=>$page]);
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
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $data = Page::find($id);

        if($request->active){
            $data->active = 1;
        }else{
            $data->active= 0;
        }

        if( $request->file('image') ){
            $img = $request->file('image')->store('upload', 'public');
            $data->image = "/".$img;
        }

        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->text = $request->text;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        $data->save();

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Page::find($id);
        $data->delete();
        return redirect()->route('pages.index');
    }
}
