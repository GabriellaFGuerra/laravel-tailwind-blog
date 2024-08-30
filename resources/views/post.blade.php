@extends('template')

@section('content')
    <div class="container grid p-4 mx-auto">
        <div class="grid-flow-row post">
            <h1 class="mt-4 mb-4 text-3xl font-bold text-center">{{ $post->title }}</h1>
            <p class="mb-6 text-gray-700">{{ $post->content }}</p>
        </div>

        <div class="grid-flow-row comments">
            <h2 class="mt-4 mb-4 text-2xl font-bold text-center">Comments</h2>
            @foreach ($post->comments as $comment)
                <div class="p-4 my-2 bg-gray-100 rounded-md">
                    <p class="font-bold">{{ $comment->user->name }}</p>
                    <p>{{ $comment->comment }}</p>
                </div>
            @endforeach
            <form action="{{ route('post.comment', $post->id) }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mb-4">
                    <label for="comment" class="block mb-2 font-bold text-gray-700">Leave a comment</label>
                    <textarea name="comment" id="comment"
                        class="block px-3 py-2 mt-1 w-full text-sm bg-white rounded-md border shadow-sm"></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Comment</button>
                </form>
            </div>
        </div>
@endsection
