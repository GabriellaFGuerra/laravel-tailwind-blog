@extends('template')

@section('content')
    <h1 class="text-3xl font-bold underline">My Blog</h1>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-xl font-bold"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p class="mb-4 text-gray-600">{{ $post->content }}</p>
                <a href="{{ route('post.show', $post->id) }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        @endforeach
    </div>
@endsection
