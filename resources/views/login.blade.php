@extends('template')

@section('content')
    <div class="flex flex-col items-center pt-6 min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            <h1 class="mb-4 text-2xl font-bold text-center">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Email
                    </label>
                    <input class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                        Password
                    </label>
                    <input class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between items-center">
                    <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
                        Login
                    </button>
                    @if (Route::has('password.request'))
                        <a class="inline-block text-sm font-bold text-blue-500 align-baseline hover:text-blue-800" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection
