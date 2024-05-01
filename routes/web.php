<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

//action - method    view
//all      index     {resource}.index
//single   show     {resource}.show
//create   create   {resource}.create
//edit      edit    {resource}.edit
//destroy   destroy  {resource}.destroy