<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\http\Controllers\AdminDashboardController;
use App\http\Controllers\UserDashboardController;
use App\http\Controllers\RoleController;
use App\http\Controllers\UserController;
use App\http\Controllers\PermissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class , "register"])->name('register');
Route::post('/register/post',[AuthController::class, "post_register"])->name('post_register');
Route::get('/login',[AuthController::class, "login"])->name('login');
Route::get('/auth/google',[AuthController::class , 'googleLogin'])->name('auth.google');
Route::get('/auth/google-callback', [AuthController::class ,'googleAuthentication'])->name('auth.google-callback');
Route::get('/admin/login', [AuthController::class , 'AdminLogin'])->name('Admin.login'); 
Route::post('/login/post', [AuthController::class, "post_login"])->name('post_login');
Route::group(['middleware'=>'superadmin'], function(){
    Route::get('/superadmin/dashboard', [AdminDashboardController::class, "superadmin_dashboard"])->name("superadmindashboard");
    Route::post('/logout', [AuthController::class , "Adminlogout"])->name("Adminlogout");
    // Role Controller
    Route::get('/panel/roles', [RoleController::class, 'showroles'])->name('ShowAdminRole');
    Route::get('/panel/roles/add', [RoleController::class, 'addroles'])->name('AddAdminRole');
    Route::post('/panel/roles', [RoleController::class, 'postroles'])->name('PostAdminRole');
    Route::get('/edit/role/{id}',[RoleController::class , "editRole"])->name('edit.role');
    Route::get('/single/role/{id}', [RoleController::class , 'show'])->name('show.role');
    Route::post('/edit/role/{id}',[RoleController::class , "updateRole"])->name('update.role');
    Route::get('/delete/role/{id}',[RoleController::class, "deleteRole"])->name('delete.role');
    // User Controller
    Route::get('/panel/users', [UserController::class, 'ListUsers'])->name('ShowAdminUsers');
    Route::get('/panel/users/add', [UserController::class, 'addusers'])->name('AddAdminUsers');
    Route::post('/panel/users', [UserController::class, 'postusers'])->name('PostAdminUsers');
    Route::get('/edit/user/{id}',[UserController::class , "edituser"])->name('edit.Users');
    Route::post('/edit/user/{id}',[UserController::class , "updateuser"])->name('update.Users');
    Route::get('/delete/user/{id}',[UserController::class, "deleteuser"])->name('delete.Users');
    //Permission
    Route::get('/panel/permission', [PermissionController::class, 'index'])->name('ShowAdminPermission');
    Route::get('/panel/permission/add', [PermissionController::class, 'create'])->name('AddAdminPermission');
    Route::post('/panel/permission', [PermissionController::class, 'store'])->name('PostAdminPermission');
    Route::get('/edit/permission/{id}',[PermissionController::class , "edit"])->name('edit.permission');
    Route::post('/edit/permission/{id}',[PermissionController::class , "update"])->name('update.Permission');
    Route::get('/delete/permission/{id}',[PermissionController::class, "destroy"])->name('delete.Permission');


});
Route::group(['middleware'=>'admin'], function(){
    
});
Route::group(['middleware'=>'user'], function(){
    Route::get('/user/dashboard', [UserDashboardController::class, "userdashboard"])->name("userdashboard");
});
