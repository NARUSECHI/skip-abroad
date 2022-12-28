<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;



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



Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    //Home
    Route::get('/',[HomeController::class,'index'])->name('index');

    //Post
    Route::get('/posts/create',[PostController::class,'index'])->name('posts.create');
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/{id}/show',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/{id}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::patch('/posts/{id}/update',[PostController::class,'update'])->name('posts.update');
    Route::delete('/posts/{id}/destroy',[PostController::class,'destroy'])->name('posts.destroy');

    
    //Profile
    Route::get('/profile/{id}',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/profile/{id}/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update');

    //Comment
    Route::post('/comment/{id}/store',[CommentController::class,'store'])->name('comment.store');
});
