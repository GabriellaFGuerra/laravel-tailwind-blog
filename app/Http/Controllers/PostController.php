<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('index')->with('posts', $posts);
    }

    public function dashboard() {

        $posts = Post::where('user_id', Auth::id())->with('comments')->get();
        return view('dashboard')->with('posts', $posts);
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
        $post->slug = Str::slug($request->input('title'));

        if (!$post->save()) {
            return Redirect::back()->withInput($request->all())->withErrors($request->errors());
        } else {
            return Redirect::back()->with('post', $post);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->get();

        return view('editPost')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->get();
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
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();

        return Redirect::back();
    }
}
