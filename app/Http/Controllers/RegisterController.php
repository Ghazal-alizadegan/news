<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create', ['user' => User::all()]);
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->get('name'),
            'role_id' => 0,
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'password' => Hash::make($request->get('password'))

        ]);
        auth()->login($user);
        return redirect('/register');
    }
}
