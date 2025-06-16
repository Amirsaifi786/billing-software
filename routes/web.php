<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginRegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[LoginRegisterController::class, 'register'])->name('register');
Route::post('/store',[LoginRegisterController::class,  'store'])->name('store');
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    // route for role and permissions
    Route::get('/admin/dashboard',[LoginRegisterController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/user/permission', [PermissionController::class,'index'])->name('permissionIndex');
    Route::get('/admin/user/permission/create', [PermissionController::class,'create'])->name('permissionCreate');
    Route::post('/admin/user/permission/store', [PermissionController::class,'store'])->name('permissionStore');
    Route::get('/admin/user/permission/edit/{id}', [PermissionController::class,'edit'])->name('permissionEdit');
    Route::PATCH('/admin/user/permission/Update/{id}', [PermissionController::class,'update'])->name('permissionUpdate');
    Route::get('/admin/user/permission/destroy/{id}', [PermissionController::class,'destroy'])->name('permissionDestroy');
    
    Route::get('/admin/user/index', [UserController::class,'index'])->name('userIndex');
    Route::get('/admin/user/create', [UserController::class,'create'])->name('userCreate');
    Route::post('/admin/user/store', [UserController::class,'store'])->name('userStore');
    Route::get('admin/user/show/{id}', [UserController::class, 'show'])->name('userShow');
    Route::get('admin/user/edit/{id}',[UserController::class,'edit'])->name('userEdit');
    Route::PATCH('admin/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
    Route::get('admin/user/destroy/{id}',[UserController::class,'destroy'])->name('userDestroy');
    
    Route::get('admin/role/index', [RoleController::class,'index'])->name('roleIndex');
    Route::get('/admin/role/create', [RoleController::class,'create'])->name('roleCreate');
    Route::post('/admin/role/store', [RoleController::class,'store'])->name('roleStore');
    Route::get('admin/role/show/{id}', [RoleController::class, 'show'])->name('roleShow');
    Route::get('admin/role/edit/{id}',[RoleController::class,'edit'])->name('roleEdit');
    Route::PATCH('admin/role/update/{id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::get('admin/role/destroy/{id}',[RoleController::class,'destroy'])->name('roleDestroy');
});