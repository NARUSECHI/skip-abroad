<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;



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
    
    //Profile
    Route::get('/profile/{id}',[ProfileController::class,'index'])->name('profile');
});
