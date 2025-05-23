<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;




//PostsController
Route::get('/', [PostsController::class,'index']) -> name('index');

Route::middleware(['auth'])->group(function () {
    route::get('/posts', [PostsController::class,'index']) -> name('posts.index');

    route::get('/posts/create', [PostsController::class ,'create']) -> name('posts.create');

    route::post('/posts' , [PostsController::class , 'store']) -> name('posts.store') ;


    route::get('/posts/{post}/edit' , [PostsController::class,'edit']) -> name('posts.edit');

    route::put('/posts/{post}',[PostsController::class,'update']) -> name('posts.update');

    route::delete('/posts/{post}' , [PostsController::class , 'destroy']) -> name('posts.destroy');

});


route::get('/posts/{post}',[PostsController::class,'show']) -> name('posts.show');
route::post('/posts/{post}/like' , [PostsController::class, 'like']) -> name('posts.like') ;




//CommentsController
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

//SearchController
Route::get('/search' ,[SearchController::class,'show'])->name('searched.show');


// AuthController

Route::middleware(['guest'])->group(function () {
    route::get('/login' , [AuthController::class , 'login']) -> name('login');
    route::post('/enter' , [AuthController::class, 'enter']) -> name('login.enter');

    route::get('/signup' , [AuthController::class , 'signup']) -> name('signup');
    route::post('/save' , [AuthController::class, 'save']) -> name('save');
});

route::post('/logout' , [AuthController::class , 'logout']) -> name('logout');


// profilecontroller

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

});
