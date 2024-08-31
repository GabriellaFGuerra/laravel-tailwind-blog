@extends('template')

@section('content')
<div class="container p-4 mx-auto">
    <h1 class="mb-4 text-3xl font-bold">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-2 font-bold text-gray-700">Name</label>
            <input type="text" class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-2 font-bold text-gray-700">Email Address</label>
            <input type="email" class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-2 font-bold text-gray-700">Password</label>
            <input type="password" class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="password" name="password" required>
            @error('password')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password-confirm" class="block mb-2 font-bold text-gray-700">Confirm Password</label>
            <input type="password" class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="password-confirm" name="password_confirmation" required>
        </div>
        <div class="mb-4">
            <a href="{{ route('login') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Already have an account?</a>
        </div>
        <div class="flex justify-between items-center">
            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Register</button>
        </div>
    </form>
</div>

@endsection
