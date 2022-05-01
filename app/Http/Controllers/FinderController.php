<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FinderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function finder(Request $request)
    {
        $text = $request->get('text');
        $posts = Post::where('title', 'LIKE', "%{$text}%")->get();
        $posts = Post::where('contents', 'LIKE', "%{$text}%")->get();

        return view('finder', compact('posts'));
    }
}
