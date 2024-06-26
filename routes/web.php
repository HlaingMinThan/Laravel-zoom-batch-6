<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\MustBeAdmin;
use App\Http\Middleware\MustBeAuthUser;
use App\Http\Middleware\MustBeGuestUser;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(MustBeAdmin::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminController::class, 'store']);
    Route::delete('/admin/blogs/{blog}/delete', [AdminController::class, 'destroy']);
    Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/blogs/{blog}/update', [AdminController::class, 'update']);
});
Route::middleware(MustBeAuthUser::class)->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
    Route::delete('/comments/{comment}/destroy', [CommentController::class, 'destroy']);
    Route::post('/blogs/{blog:slug}/handle-subscription', [SubscriberController::class, 'toggle']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
});

Route::middleware(MustBeGuestUser::class)->group(function () {
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/{user:username}', [ProfileController::class, 'show']); //

//action - method    view
//all      index     {resource}.index
//single   show     {resource}.show
//create   create   {resource}.create
//create   store   {resource}.store
//edit      edit    {resource}.edit
//destroy   destroy  {resource}.destroy
