<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenusController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Menu::all();
        return view('dashboard.menu.list', ['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.menu.add');
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
            'name' => 'required|max:255'
        ]);

        $data = new Menu();

        $data->name = $request->name;
        $data->code = $request->code;

        $data->save();

        return redirect()->route('menus.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.menu.edit', ['result'=>$menu]);
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
            'name' => 'required|max:255'
        ]);

        $data = Menu::find($id);
        $data->name = $request->name;
        $data->code = $request->code;
        $data->save();

        return redirect()->route('menus.index');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::find($id);
        $data->delete();
        return redirect()->route('menus.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function builder($id){
      $result = MenuItem::where(['menu_id'=>$id])->get();
      return view('dashboard.menu_items.list', ['menu_id'=>$id, 'result'=>$result]);
    }


    public function additem($id){
        return view('dashboard.menu_items.add',['menu_id'=>$id]);
    }

    public function menuitemedit($id){

        $result = MenuItem::find($id);
        return view('dashboard.menu_items.edit', ['menu_id'=>$result->menu_id,'result'=>$result]); 
    }

    public function menuitemadd(Request $request){
        
        // dd($request);

        $request->validate([
            'title' => 'required|max:255'
        ]);        

        $active = 0;
        if($request->active){
            $active = 1;
        }

        $data = new MenuItem;
        $data->title = $request->title;
        $data->code = $request->code;
        $data->url = $request->url;
        $data->menu_id = $request->menu_id;       
        
        $data->save();
       
        return redirect('/dashboard/menus/builder/'.$request->menu_id);
    }


    public function menuitemupdate(Request $request, $id)
    {
        $data = MenuItem::find($id);
        $data->sort = $request->sort;
        $data->title = $request->title;
        $data->code = $request->code;
        $data->url = $request->url;
        // $data->menu_id = $request->menu_id;
        $data->save();
        return redirect('/dashboard/menus/builder/'.$request->menu_id);
    }

    public function menuitemremove(Request $request, $id)
    {
        $data = MenuItem::find($id);
        $data->delete();
        return redirect('/dashboard/menus/builder/'.$request['menu_id']);
    }


}
