<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\role;
use App\Model\admin\Permission;

class RoleController extends Controller
{
 
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $roles = role::all();
        return view('admin.role.show',compact('roles'));
    }// end of index

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50|unique:roles',
        ]);

        $role = new role;
        $role->name = $request->name;
        $role->save();
        $role-> permissions()->sync($request->permission);
        return redirect()->route('role.index');
    }//end of store

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
         
        $permissions = Permission::all();
        $role = role::find($id);
        return view('admin.role.edit',compact('role','permissions'));
    }//end of edit

    
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'name' => 'required|max:50',
        ]);

        $role = role::find($id);
        $role->name = $request->name;
        $role->save();
        $role-> permissions()->sync($request->permission);

        return redirect()->route('role.index');
    }//end of update

    public function destroy($id)
    {
        role::where('id',$id)->delete();
        return redirect()->back();
    }// end of destroy
}//end of RoleController
