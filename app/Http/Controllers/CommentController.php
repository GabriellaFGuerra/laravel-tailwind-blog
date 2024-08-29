<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->save();

        return Redirect::back()->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment = Comment::find($comment);
        $comment->comment = $request->input('comment');
        $comment->save();

        return Redirect::back()->with('comment', $comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Comment::find($comment)->first()->delete();
        return Redirect::back();
    }
}
