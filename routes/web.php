<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Post;

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

Route::get('/', [IndexController::class,'index'])->name('home');

Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
    'comments'=>'CommentController'
]);

/*
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function() {
    Route::get('/users', function() {
        return "admin.....users.";
    })->name('admin.users');
    Route::get('/posts', function() {
        return "admin.....posts.";
    })->name('admin.posts');
});

Route::get('posts/{post?}', function(Post $post) {
    if($post == null) {
        return Post::all();
    }
    $post = Post::findOrFail($post);
    return $post;
})->where('post', '[0-9]+');
*/

Auth::routes();

/*
Route::get('/about', function () {
    $contents = file_get_contents(resource_path().'/pages/about.html');
    return view('about', ['contents'=>$contents]);
})->name('about');

Route::get('/about', [AboutController::class, 'index']);


Route::get('/dashboard', 'HomeController@index')->name('dashboard');
*/


