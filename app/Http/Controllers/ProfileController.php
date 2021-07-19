<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show ()
    {
        if(!auth()->check()){
            abort(403);
        }
        $user=auth()->user();
        return view('profile.show',['user'=>$user]);
    }

    public function edit ()
    {
        $user=auth()->user();
//        dd("s");
        return view('profile.edit',['user'=>$user]);
    }

    public function  update(ProfileRequest $request)
    {
        auth()->user()->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile')
        ]);
        return redirect('/profile');
    }
}
