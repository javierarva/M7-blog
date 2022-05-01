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
| contains the "kebab" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@create')->name('postsCreate');

Route::middleware(['auth','role:admin'])->get('/admin', 'AdminController@admin')->name('admin');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::get('/profile/edit', 'UserController@index')->name('editProfile');

Route::post('/finder', 'FinderController@finder')->name('finder');

Route::resources([
    'posts' => 'PostController',
    'users' => 'UserController',
    'comments' => 'CommentController',
    'tags' => 'TagController'
]);

Auth::routes();
