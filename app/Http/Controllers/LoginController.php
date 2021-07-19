<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store(LoginRequest $request)
    {
        $user = User::query()->where('email', $request->get('email'))->firstOrFail();
        if (!Hash::check($request->get('password'), $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
        }
        auth()->login($user);
        return redirect('/');
    }

    public function destroy(User $user)
    {
        auth()->logout();
        return redirect('/');
    }
}
