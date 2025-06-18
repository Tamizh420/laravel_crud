<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use App\Livewire\UserShow;

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
 
Route::get('/roles', function () {
    return view('role');
});

Route::get('/users/{user}',[ShowController::class,'show'])->name('users.show');
Route::delete('/delete-role/{id}', [ShowController::class, 'destroy'])->name('delete.role');
Route::view('/', 'layouts.app')->name('home');

