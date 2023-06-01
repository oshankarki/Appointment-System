<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Backend\Role;
use App\Models\Student;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function create()
    {

        return view('role.create');
    }
    public function store(Request $request)
    {

        $role = Role::create($request->all());
        if($role)
        {
            return redirect()->route('role.index')->with('success', 'Role created successfully');
        }
        else{
            return redirect()->back()->withErrors('Role Creation Failed');
        }
        return redirect()->route('role.index');
    }
    public function index()
    {

        $records = Role::all();
        return view('role.index', compact('records'));
    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role Deleted successfully');
    }
    public function edit($id)
    {
        $data['record'] = Role::find($id);
        if (!$data['record']) {
            request()->session()->flash('error', "Error:Invalid Request");
            return redirect()->route('role.index');

        }
        return view(('role.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {

            $data['record']=Role::find($id);
            if(!$data['record' ]){
                request()->session()->flash('error',"Error:Invalid Request");
                return redirect()->route('role.index');
            }
            $record=$data['record']->update($request->all());
            if($record)
            {
                return redirect()->route('role.index')->with('success', 'Role Updated successfully');
            }else{
                return redirect()->back()->withErrors('Role Updation Failed');

            }
        return redirect()->route('role.index');
    }

}
