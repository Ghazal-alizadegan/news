<?php

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
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::middleware('guest')->group(function (){
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create']);
    Route::post('/register/store', [\App\Http\Controllers\RegisterController::class, 'store']);
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'create'])->name('login');
    Route::post('/login/store', [\App\Http\Controllers\LoginController::class, 'store']);

});
    Route::middleware("auth")->group(function () {
    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
    Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store']);
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);
    Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);
    Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);

    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create']);
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
    Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::get('/categories/{cat}/edit', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::patch('/categories/{cat}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('/categories/{cat}', [\App\Http\Controllers\CategoryController::class, 'destroy']);

    Route::delete('/logout', [\App\Http\Controllers\LoginController::class, 'destroy']);
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show']);
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit']);
    Route::patch('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update']);

    Route::get('/role', [\App\Http\Controllers\RoleController::class, 'index']);
    Route::get('/role/create', [\App\Http\Controllers\RoleController::class, 'create']);
    Route::post('/role/store', [\App\Http\Controllers\RoleController::class, 'store']);
    Route::get('/role/{role}', [\App\Http\Controllers\RoleController::class, 'edit']);
    Route::patch('role/{role}', [\App\Http\Controllers\RoleController::class, 'update']);
    Route::delete('/role/{role}', [\App\Http\Controllers\RoleController::class, 'destroy']);

    Route::get('/users',[\App\Http\Controllers\UserComtroller::class,'index']);
    Route::get('/users/{user}/edit',[\App\Http\Controllers\UserComtroller::class,'edit']);
    Route::patch('/users/{user}',[\App\Http\Controllers\UserComtroller::class,'update']);
    Route::delete('/users/{user}',[\App\Http\Controllers\UserComtroller::class,'destroy']);

});
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);


