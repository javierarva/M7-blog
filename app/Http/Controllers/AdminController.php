<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $user = User::all();
        $post = Post::all();

        return view('admin', ['users' => $user, 'posts' => $post]);
    }
}
