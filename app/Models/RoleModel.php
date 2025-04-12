<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Role;

class RoleModel extends Model
{
    use HasFactory;
   protected $table = 'role';
   static public function getRecord()
   {
    return RoleModel::get();
   }
   static public function getSingle($id)
   {
    return RoleModel::find($id);
   }
}
