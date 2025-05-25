<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;




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


// Tag Controller
Route::get('/tags/{tag}' , [TagController::class , 'show']) -> name('tags.show');

//CommentsController
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

//SearchController
Route::get('/search' ,[SearchController::class,'show'])->name('searched.show');


// AuthController

Route::middleware(['guest'])->group(function () {
    route::get('/login' , [AuthController::class , 'showLoginForm']) -> name('login');
    route::post('/login' , [AuthController::class, 'login']) -> name('login.submit');

    route::get('/register' , [AuthController::class , 'showRegisterForm']) -> name('register');
    route::post('/register' , [AuthController::class, 'register']) -> name('register.submit');
});

route::post('/logout' , [AuthController::class , 'logout']) -> name('logout');


// profilecontroller

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

});
