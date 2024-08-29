<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ]
        );

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();

        if (!$post->save()) {
            return Redirect::back()->withInput($request->all())->withErrors($request->errors());
        } else {
            return Redirect::to('post')->with($post);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $id)
    {
        $post = Post::find($id)->with(['user', 'comments'])->get();

        return view('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $id)
    {
        $post = Post::find($id)->get();

        return view('editPost', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $id)
    {
        $post = Post::find($id)->get();
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if (!$post->save()) {
            return Redirect::back()->withInput($request->all())->withErrors($request->errors());
        } else {
            return Redirect::to('post')->with($post);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $id)
    {
        $post = Post::find($id)->first();
        $post->delete();

        return Redirect::to('index');
    }
}
