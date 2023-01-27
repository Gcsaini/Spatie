<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.show',compact('roles','permissions','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('message','You are admin');
        }
        $user->delete();
        return back()->with('message','User deleted successfully');
    }


    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('message','Role already exist');
        }
        $user->assignRole($request->role);
        return back()->with('message','Role added');

    }

    public function revokeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('message','Role removed');
        }
        
        return back()->with('message','Role not exists');
    }


    public function assignPermission(Request $request, User $user)
    {
       
      
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message','permission already exists');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message','permission added');
    }

    public function revokePermission(User $user, Permission $permission)
    {
       
      
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('message','permission revoked');
        }
        
        return back()->with('message','permission not exists');
    }
}
