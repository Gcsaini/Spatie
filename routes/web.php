<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Indexcontroller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[Indexcontroller::class, 'index'])->name('index');
    Route::resource('roles',RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permission.revoke');
    Route::resource('permission',PermissionController::class);
    Route::post('/permission/{permission}/roles',[PermissionController::class , 'assignRole'])->name('permission.roles');
    Route::delete('/permission/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permission.roles.remove');
    Route::resource('users',UserController::class);
    Route::delete('/users/{user}/role/{role}', [UserController::class,'revokeRole'])->name('users.revoke.role');
    Route::post('/users/{user}/role', [UserController::class,'assignRole'])->name('users.assign.role');
    Route::post('/users/{user}/permission', [UserController::class,'assignPermission'])->name('users.assign.permission');
    Route::delete('/users/{user}/permission/{permission}', [UserController::class,'revokePermission'])->name('users.revoke.permission');
});




