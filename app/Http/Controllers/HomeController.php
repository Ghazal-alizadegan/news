<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index ()
    {
        $posts=post::all();
        $categories=category::all();
//        dd($categories);
        return view('welcome',['posts'=>$posts,'categories'=>$categories]);
    }
}
