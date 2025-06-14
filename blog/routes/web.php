<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/adhaar', function () {
    return view('welcome');
});

Route::get('/about/{id}', function ($id) {
    return ('about'." ". $id);
});
Route::get('/posts', [PostController::class, 'index']);

//use Illuminate\Support\Facades\Route;

Route::get('/crud', function () {
    return view('crud');
});
 




