<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class RoleController extends Controller

{
    public function showroles()
{
    $data['getRecord'] = Role::orderBy('name', 'ASC')->paginate(5);
    return view("Admin.Roles.AdminRoles", $data);
}
    public function addroles()
    {
        $permission = Permission::get()->all();
        // dd($permission);
        return view('Admin.Roles.AddRole',["permission"=>$permission]);
    }
    public function postroles(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "role" => "required|unique:roles,name",
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('AddAdminRole')
                             ->withInput()
                             ->withErrors($validator);
        }
    
        // Create the role
        $role = Role::create(["name" => $request->role]);
    
        // Assign permissions if selected
        if (!empty($request->permission)) {
            foreach ($request->permission as $permissionId) {
                $permission = Permission::find($permissionId);
                if ($permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }
    
        return redirect()->route('ShowAdminRole')->with("success", "Role added successfully");
    }
    
    public function editRole($id){
        $role = Role::findOrFail($id); // Get the Role object directly
        $permission = Permission::all(); // This is already a collection
    
        return view('Admin.Roles.editRole', [
            "getRecord" => $role, // Pass object directly
            "permission" => $permission
        ]);
    }
    
    public function updateRole($id, Request $request)
{
    $role = Role::findOrFail($id);

    $validator = Validator::make($request->all(), [
        "role" => [
            'required',
            'min:3',
            Rule::unique('roles', 'name')->ignore($id),
        ]
    ]);

    if ($validator->passes()) {
        $role->name = $request->role;
        $role->save();

        if (!empty($request->permission)) {
            $permissions = Permission::whereIn('id', $request->permission)->pluck('name')->toArray();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }

        return redirect()->route('ShowAdminRole')->with('success', 'Role Updated Successfully');
    } else {
        return redirect()->route('edit.role', ['id' => $id])->withErrors($validator);
    }
}
    public function show($id,Request $request){
    $role = Role::find($id);
    return view('Admin.Roles.AdminRoles', ["roles"=>$role]);
}
    public function deleteRole($id,Request  $request)
    {
       $record = Role::findOrfail($id);
       $record->delete();
       return redirect('/panel/roles')->with("success","Role deleted Successfully");

    }
}
