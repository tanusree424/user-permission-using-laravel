<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Permissions;

class PermissionModel extends Model
{
    use HasFactory;
    protected $table = "permissions";
    static public function getRecord()
    {
        return Permissions::get();
    }
}
