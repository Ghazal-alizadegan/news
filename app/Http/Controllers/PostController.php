<?php

namespace App\Http\Controllers;

use App\Http\Middleware\checkPermission;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(checkPermission::class . ":read-post")->only('show');
        $this->middleware(checkPermission::class . ":create-post")->only(['store','create']);
        $this->middleware(checkPermission::class . ":update-post")->only(['edit','update']);
        $this->middleware(checkPermission::class . ":delete-post")->only('destroy');
    }
    public function show(post $post)
    {
//        $post=post::query()->where('slug',$slug)->first();

        return view('posts.detail', ['post' => $post]);

    }

    public function create()
    {
        return view('posts.create',['category'=>category::all()]);

    }

    public function store(NewPostRequest $request)
    {
        post::query()->create([
                'title' => $request->get('title'),
                'slug' => $request->get('slug'),
                'body' => $request->get('body'),
                'category_id'=>$request->get('category_id')
            ]
        );
        return redirect('/');
    }

    public function edit  (post $post)
    {
        return view('posts.edit',['post'=>$post,'category'=>category::all()]);
    }

    public function update  (UpdatePostRequest $request ,post $post)
    {
        $a=post::query()->where('slug',$request->get('slug'))->where('id','!=',$post->id)->exists();
        if($a){
            return redirect()->back()->withErrors(['slug'=>'tekrari']);
        }
        $post->update([
            'title'=>$request->get('title'),
            'slug'=>$request->get('slug'),
            'body'=>$request->get('body'),
            'category_id'=>$request->get('category_id'),
        ]);
        return redirect('/');
    }

    public function destroy (post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
