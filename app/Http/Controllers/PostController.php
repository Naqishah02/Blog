<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // index
    public function index(){
        $posts = Post::latest()->simplePaginate(5);
        return view('welcome', ['posts' => $posts]);
    }
    // create
    public function create(){
        return view('post.create');
    }
    // show
    public function show(Post $post){
        $userId = Auth::user()->id;
        $post = Post::with('comments')->find($post->id);
        return view('post.show', ['post' => $post, 'userId' => $userId]);
    }
    // store
    public function store(){
        // validate
        $validated = request()->validate([
           'title' => ['required', 'min:3'],
           'content' => ['required', 'min:3']
        ]);
        $userId = Auth::user()->id;
        // create a post
        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => $userId
        ]);
        // redirect
        return redirect('/');
    }
    // edit
    public function edit(Post $post){
        return view('post.edit', ['post' => $post]);
    }
    // update
    public function update(Post $post){
        $userId = $post->user->id;
        // validate
        $validated = request()->validate([
           'title' => ['required','min:3'],
           'content' => ['required', 'min:3']
        ]);
        // save
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => $userId
        ]);
        // redirect
        return redirect('/post/' . $post->id);
    }
    // destroy
    public function destroy(Post $post){
        $post->delete();
        // redirect
        return redirect('/profile');
    }
}
