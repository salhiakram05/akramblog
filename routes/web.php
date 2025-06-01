<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Auth\EmailVerificationController;




//PostsController CRUD for only users

Route::middleware(['verified']) -> prefix('posts') ->  controller(PostsController::class) -> name('posts.') -> group( function () {

    Route::get('/', 'dashboard') -> name('dashboard');

    Route::get('/create', 'create' ) -> name('create');

    Route::post('' ,  'store' ) -> name('store') ;

    Route::get('/{post}/edit' , 'edit' ) -> middleware('can:update,post') -> name('edit');

    Route::put('/{post}', 'update' ) -> name('update');

    Route::delete('/{post}' , 'destroy' ) -> name('destroy');

});

// PostsController for all visitors ( index , show , like )

Route::get('/', [PostsController::class,'index']) -> name('index') ;

Route::get('/posts/{post}',[PostsController::class,'show']) -> name('posts.show');

Route::post('/posts/{post}/like' , [PostsController::class, 'like']) -> name('posts.like') ;



// profilecontroller

Route::middleware(['auth' , 'verified']) -> group ( function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

});




// Tag Controller
Route::get('/tags/{tag}' , [TagController::class , 'show']) -> name('tags.show');

//CommentsController
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

//SearchController
Route::get('/search' ,[SearchController::class,'show'])->name('searched.show');


// AuthController

Route::middleware('guest')->group( function () {

    Route::get('/login' , [AuthController::class , 'showLoginForm']) -> name('login');

    Route::post('/login' , [AuthController::class, 'login']) -> name('login.submit');

    Route::get('/register' , [AuthController::class , 'showRegisterForm']) -> name('register');

    Route::post('/register' , [AuthController::class, 'register']) -> name('register.submit');

});

Route::post('/logout' , [AuthController::class , 'logout']) -> middleware('auth') -> name('logout');






// email verification

Route::middleware('auth')->controller(EmailVerificationController::class)->name('verification.')->group( function(){

    Route::get('/email/verify', 'showVerificationNotice') -> name('notice');

    Route::get('/email/verify/{id}/{hash}', 'verify' ) -> middleware('signed') -> name('verify');

    Route::post('/email/verification-notification', 'resend' )-> middleware('throttle:6,1') -> name('send');

});



// testing
use Illuminate\Http\Request;

Route::get('testing' , function(Request $request){
    return [
        'Laravel sees URL as' => $request->url(),
        'Request scheme' => $request->getScheme(),
        'X-Forwarded-Proto' => $request->header('X-Forwarded-Proto'),
    ];


});