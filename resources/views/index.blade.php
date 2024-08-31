@extends('template')

@section('content')
    <h1 class="text-3xl font-bold text-center">All Posts</h1>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-xl font-bold"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>Posted at: {{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString($post->created_at) }}</p>
                <p class="mb-4 text-gray-600">Author: {{ $post->user->name }}</p>
                <a href="{{ route('post.show', $post->id) }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        @endforeach
    </div>
@endsection
