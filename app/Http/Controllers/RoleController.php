<?php

namespace App\Http\Controllers;

use App\Http\Middleware\checkPermission;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(checkPermission::class . ":read-role")->only('index');
        $this->middleware(checkPermission::class . ":create-role")->only(['store','create']);
        $this->middleware(checkPermission::class . ":update-role")->only(['edit','update']);
        $this->middleware(checkPermission::class . ":delete-role")->only('destroy');
    }
    public function index()
    {
        $role = Role::all();
        return view('roles.index', ['roles' => $role]);
    }

    public function create()
    {
        $permissions = permission::all();
        return view('roles.create', ['permissions' => $permissions]);
    }

    public function store(CreateRoleRequest $request)
    {
        $role = Role::query()->create([
            'title' => $request->get('title')
        ]);
        $role->permissions()->attach($request->get('permissions'));
        return redirect('/role');

    }

    public function edit (Role $role)
    {
        $a = Role::all();
//        dd($role->title);
        $permissions = permission::all();
        return view('roles.edit',['role'=>$role,'permissions' => $permissions]);
    }

    public function update(UpdateRoleRequest $request,Role $role)
    {
        $role->update([
            'title'=>$request->get('title')
        ]);
        $role->permissions()->sync($request->get('permissions'));
        return redirect('/role');
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect('/role');
    }

}
