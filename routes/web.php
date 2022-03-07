<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "kebab timmy" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/posts', [PostController::class,'index'])->name('posts.index');

Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
    'comments'=>'CommentController'
]);

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile/admin', 'ProfileController@admin')->name('admin')->middleware(['auth', 'role:admin']);

//Route::get('/posts', 'PostController@index')->name('posts.index');
Route::put('/posts/create', 'PostController@create')->name('posts.create');

Auth::routes();
