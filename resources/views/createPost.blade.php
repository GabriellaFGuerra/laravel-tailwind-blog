@extends('template')

@section('content')
<div class="container p-4 mx-auto">
    <h1 class="mb-4 text-3xl font-bold">Create New Post</h1>
    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-4">
            <label for="title" class="block mb-2 font-bold text-gray-700">Title:</label>
            <input type="text" class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="title" name="title" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block mb-2 font-bold text-gray-700">Content:</label>
            <textarea class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="content" name="content" rows="10" required></textarea>
        </div>
        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Create Post</button>
    </form>
</div>

@endsection
