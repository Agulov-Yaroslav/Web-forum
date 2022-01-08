<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/topic', [App\Http\Controllers\TopicController::class, 'list'])->name('topic');

Route::get('/topic/{id}', [App\Http\Controllers\TopicController::class, 'one']);

Route::get('/update/{$id}/user/{$user_id}', [App\Http\Controllers\HomeController::class, 'update']);

Route::post('/topic', [App\Http\Controllers\TopicController::class, 'store']);

Route::post('/topic/{id}', [App\Http\Controllers\TopicController::class, 'comment']);

Route::get('/users', [App\Http\Controllers\UsersController::class, 'users'])->name('users');

