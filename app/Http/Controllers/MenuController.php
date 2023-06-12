<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Backend\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create()
    {
        return view('menu.create');
    }
    public  function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->title= $request->title;
        $menu->slug= $request->slug;
        $menu->save();
        return redirect(route('menu.index'))->with('success',"Menu Created Sucessfully");

    }
    public  function  index()
    {
        $records = Menu::get();
        return view('menu.index', compact('records'));
    }
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->back()->with('success', 'Menu Deleted successfully');
    }
    public function edit($id)
    {
        $data['record'] = Menu::find($id);
        if (!$data['record']) {
            request()->session()->flash('error', "Error:Invalid Request");
            return redirect()->route('menu.index');

        }
        return view(('menu.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {

        $data['record']=Menu::find($id);
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route('menu.index');
        }
        $record=$data['record']->update($request->all());
        if($record)
        {
            return redirect()->route('menu.index')->with('success', 'Menu Updated successfully');
        }else{
            return redirect()->back()->withErrors('Menu Updation Failed');

        }
        return redirect()->route('menu.index');
    }


}
