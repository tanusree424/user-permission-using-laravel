<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function ListUsers()
    {
        $data = User::get()->all();
        // dd($data);
        return view("Admin.AdminUser.AdminUser", ['user'=>$data]);
    }
    public function addusers()
    {

    }
    public function postusers(Request $request)
    {

    }
    public function edituser(Request $request)
    {
        
    }
    public function updateuser(Request $request)
    {
        
    }
    
    public function deleteuser(Request $request)
    {
        
    }
}
