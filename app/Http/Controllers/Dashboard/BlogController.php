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

        $count = $blog->count();
        $result = $blog->paginate($pageSize);        

        // $parser = new \Gbuckingham89\YouTubeRSSParser\Parser();
        // $rss_url = 'https://www.youtube.com/feeds/videos.xml?channel_id=UC6lOaOkQr0z7Ptnx5jOJuGA';
        // $r = $parser->loadUrl($rss_url);        
        // foreach($r->videos as $video){
        //     // dump($video);
        //     $data = new Blog();
        //     $data->created_by = auth()->user()->id;
        //     $data->category_id = 1;
        //     $data->sort = ( !empty($request->sort)? $request->sort: 500);
        //     $data->active = 1;
        //     $data->title = $video->title;
        //     $data->preview_text = $video->description;
            
        //     $data->detail_text = '<iframe width="80%" height="600" src="https://www.youtube.com/embed/'.$video->id.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        //     $data->created_at = $video->published_at;
        //     $data->preview_image = $video->thumbnail_url;
        //     $data->detail_image = $video->thumbnail_url;
        //     $data->meta_title = $video->title;
        //     $data->meta_description = mb_substr($video->description, 0, 255);
        //     $data->save();
        // }

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

        $blogtypes = blogtypes();

        return view('dashboard.blog.form', compact('catagories', 'blogtypes'));
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

        $active = 0;
        if($request->active){
            $active = 1;
        }

        if( !empty($request->alias) ){
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

        $data->type = $request->type; 
        $data->video_url= $request->video_url;

        if($request->type=='youtube'){

            $videoid = getYoutubeVideoID($request->video_url); 
            
            $fileContent = file_get_contents("https://img.youtube.com/vi/".trim($videoid)."/maxresdefault.jpg");			
            
            $image_url = '/upload/'.$videoid.'.jpg'; 
            $filePath = storage_path().'/app/public/'.$image_url;
                       

            $r = file_put_contents($filePath, $fileContent);   

            if($r){
                $data->preview_image = $image_url;
                $data->detail_image = $image_url;

                $data->detail_text = '<iframe width="704" height="306" src="https://www.youtube.com/embed/'.$videoid.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
        }


        // $formData = $request->input();
        //$formData['sort'] = ( !empty($request->sort)? $request->sort: 500); 

        // $data->fill($formData);

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
        $blogtypes = blogtypes();
        $result = $blog;
        return view('dashboard.blog.form', compact('catagories', 'blogtypes', 'result') );
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

        $data->type = $request->type; 
        $data->video_url= $request->video_url;

        if($request->type=='youtube'){

            $videoid = getYoutubeVideoID($request->video_url); 
            
            $fileContent = file_get_contents("https://img.youtube.com/vi/".trim($videoid)."/maxresdefault.jpg");			
            
            $image_url = '/upload/'.$videoid.'.jpg'; 
            $filePath = storage_path().'/app/public/'.$image_url;
                       

            $r = file_put_contents($filePath, $fileContent);   

            if($r){
                $data->preview_image = $image_url;
                $data->detail_image = $image_url;

                $data->detail_text = '<iframe width="704" height="306" src="https://www.youtube.com/embed/'.$videoid.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
        }


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
