<?php

namespace App\Http\Controllers;

use App\Http\Middleware\checkPermission;
use App\Http\Requests\CreateCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(checkPermission::class . ":read-category")->only('index');
        $this->middleware(checkPermission::class . ":create-category")->only(['store','create']);
        $this->middleware(checkPermission::class . ":update-category")->only(['edit','update']);
        $this->middleware(checkPermission::class . ":delete-category")->only('destroy');
    }

    public function index ()
    {
        $categories=category::all();
        return view('categories.index',['categories'=>$categories]);
    }
    public function create ()
    {
        return view('categories.create');
    }
    public function store (CreateCategoriesRequest  $request)
    {
        category::query()->create([
            'title'=>$request->get('title')
        ]);
        return redirect('/');
    }

    public function edit (category $cat)
    {
        return view('categories.edit',['cat'=>$cat]);
    }

    public function update (UpdateCategoriesRequest $request,category $cat)
    {
        $a=category::query()->where('title',$request->get('title'))->where('id','!=',$cat->id)->exists();
        if ($a){
            return redirect()->back()->withErrors(['title'=>'tekrari']);
        }
    $cat->update([
        'title'=>$request->get('title')
    ]);
        return  redirect('/categories');
    }

    public function destroy (category $cat)
    {
        if ($cat->posts->count()>0){
            return redirect()->back()->withErrors(['category'=>'This category has posts that cannot be deleted']);
        }
        else {
            $cat->delete();
            return redirect('/categories');
        }
    }
}
