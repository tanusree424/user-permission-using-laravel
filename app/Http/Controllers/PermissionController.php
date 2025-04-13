<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionModel;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data['getRecord'] = Permission::get()->all();

        return view("Admin.Permission.ListPermision",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Permission.AddPermission");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            "name"=>"required|unique:permissions"
        ]);
        if ($validator->passes()) {
            Permission::create(["name"=>$request->name,"guard_name"=>"web"]);
            return redirect()->route('ShowAdminPermission')->with("success", "Permission Addede Successfully");
        }else
        {
            return redirect()->route('AddAdminPermission')->withInput()->withErrors($validator);
        }
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
        $permission =  Permission::findOrfail($id);
        // dd($permission);
       return view("Admin.Permission.EditPermission",["permission"=>$permission]);
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
        $permission = Permission::findOrfail($id);
        $validator = Validator::make($request->all(),[
            "name"=>"required|min:3|unique:permissions,name,$id,id"
        ]);
        if ($validator->passes()) {
           $permission->name = $request->name;
           $permission->save();
           return redirect()->route('ShowAdminPermission')->with("success", "Permission Updated Successfully");
        }else
        {
            return redirect()->route('edit.permission',$id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
    
            return redirect()->route("ShowAdminPermission")->with("success","Deleted Successfully");
        } catch (\Exception $e) {
            \Log::error('Permission delete error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong'], 500);
        }
    }
    
}
