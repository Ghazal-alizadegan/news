<?php

namespace App\Http\Controllers;

use App\Http\Middleware\checkPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserComtroller extends Controller
{
    public function __construct()
    {
        $this->middleware(checkPermission::class . ":read-role")->only('index');
        $this->middleware(checkPermission::class . ":update-role")->only(['edit','update']);
        $this->middleware(checkPermission::class . ":delete-role")->only('destroy');
    }
    public function index ()
    {
        return view('users.index',['users'=>User::all()]);
    }

    public function edit (User $user)
    {
        $role= Role::all();
        return view('users.edit',['user'=>$user,'role'=>$role]);
    }

    public function update (Request $request,User $user)
    {
        $user->update([
            'role_id'=>$request->get('role_id'),
            'name'=>$request->get('name'),
            'mobile'=>$request->get('mobile'),
            'email'=>$request->get('email'),
        ]);
        return redirect('/users');
    }

    public function  destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
