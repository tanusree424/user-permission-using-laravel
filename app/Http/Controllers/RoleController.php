<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
class RoleController extends Controller
{
    public function showroles()
    {
        $data['getRecord'] = RoleModel::getRecord();
        return view("Admin.Roles.AdminRoles", $data);
    }
    public function addroles()
    {
        return view('Admin.Roles.AddRole');
    }
    public function postroles(Request $request)
    {
       // dd($request->all());
       $save = new RoleModel;
       $save->name = $request->role;
       $save->save();
       return redirect('/panel/roles')->with("success","Role Created Successfully");

    }
    public function editRole($id){
        $data['getRecord'] = RoleModel::getSingle($id);
        return view('Admin.Roles.editRole', $data);
    }
    public function updateRole($id,Request  $request)
    {
        $save = new RoleModel;
        $save->name = $request->role;
        $save->save();
        return redirect('/panel/roles')->with("success","Role Updated Successfully");

    }
    public function deleteRole($id,Request  $request)
    {
       $record = RoleModel::getSingle($id);
       $record->delete();
       return redirect('/panel/roles')->with("success","Role deleted Successfully");

    }
}
