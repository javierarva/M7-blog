<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Policies\PostPolicy;
use App\Tag;

class PostController extends Controller {

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user = Auth::user();

        if($user = Auth::user()) {
            $posts = Post::where('user_id', $user->id)->get();
        } else {
            $posts = Post::all();
        }

        return view('posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $user = Auth::user();

        return view('postsCreate', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $tags = explode(',', $request->get('tag'));

        $validatedData = $request->validate([
            'title' => 'required|max:90',
            'contents' => 'required|max:255'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        $createdPost = Post::create($validatedData);

        foreach($tags as $tag) {
            $createdTag = Tag::create(['tag' => $tag]);

            $createdPost->tags()->attach($createdTag);
        }

        return redirect('/posts')->with('success', 'Has subido un post.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        $tags = $post->tags;
        return view('postsEdit', ['post' => $post, 'tags' => $tags]);
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
            'title' => 'required|max:90',
            'contents' => 'required|max:255'
        ]);

        $post->update($validatedData);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->destroy($post->id);
        return back();
    }
}
