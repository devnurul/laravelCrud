<?php

use App\Http\Controllers\admin\MasterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\admin\MasterController::class, 'dashboard']);
Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'users']);
Route::get('user/create', [App\Http\Controllers\admin\UserController::class, 'createUuser']);

Route::post('user/store', [App\Http\Controllers\admin\UserController::class, 'storeUser']);

Route::get('user/edit/{id}', [App\Http\Controllers\admin\UserController::class, 'updateUser']);
Route::put('user/edit/{id}', [App\Http\Controllers\admin\UserController::class, 'updateSubmit']);

Route::delete('user/delete/{id}', [App\Http\Controllers\admin\UserController::class, 'delete']);

//resource_path

Route::resource('blogCategory', App\Http\Controllers\admin\BlogCategoryController::class);
Route::resource('blog', App\Http\Controllers\admin\BlogController::class);