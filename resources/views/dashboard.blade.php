@extends('template')

@section('content')
<div class="container p-6 mx-auto">
    <h1 class="mb-6 text-3xl font-bold text-center">Dashboard</h1>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-xl font-bold">Total Posts</h2>
            <p class="text-lg text-gray-700">{{ $posts->count() }}</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-xl font-bold">Total Comments</h2>
            <p class="text-lg text-gray-700">0</p>
        </div>
    </div>
    <div class="mt-6">
        <h2 class="mb-4 text-2xl font-bold">Recent Posts</h2>
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Posted at</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td class="px-4 py-2">{{ $post->title }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('post.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                        <a href="{{ route('post.delete', $post->id) }}" class="text-red-500 hover:text-red-700">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
