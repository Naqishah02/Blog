<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // store
    public function store(){
        // validate
        $validated = request()->validate([
           'content' => ['required','min:3'],
           'post_id' => ['required', 'exists:posts,id'],
        ]);
        $validated['user_id'] = Auth::user()->id;
        // create
        Comment::create($validated);
        // redirect
        return redirect()->route('post.show', request('post_id'));
    }
    // show
    public function show(){
        $userId = Auth::user()->id;
        $comments = Comment::with('post')->where('user_id', $userId)->latest()->paginate(15);
        return view('profile.comments', ['comments' => $comments, 'userId' => $userId]);
    }
    // update
    public function update(Comment $comment){
        // validate
        $validated = request()->validate([
           'content' => ['required','min:3'],
        ]);
        // update
        $comment->update($validated);
        // redirect
        return redirect()->route('post.show', $comment->post_id);
    }
    // destroy
    public function destroy(Comment $comment){
        $comment->delete();
        // redirect
        return redirect()->route('post.show', $comment->post_id);
    }
}
