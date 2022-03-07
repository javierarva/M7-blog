<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Policies\PostPolicy;

class PostController extends Controller {

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post) {

        $user = Auth::user();

        if($user = Auth::user()) {
            $posts = Post::where('user_id', $user->name);
        } else {
            $posts = Post::all();
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'string|unique:posts|max:90',
            'contents' => 'string'
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['category_id'] = '1';

        Post::create($validatedData);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        $validatedData = $request->validate([
            'title' => 'string|unique:posts|max:90',
            'contents' => 'string'
        ]);

        $post->update($validatedData);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
