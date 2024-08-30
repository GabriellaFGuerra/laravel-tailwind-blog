    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Personal Blog</title>
    </head>

    <body class="overflow-y-auto">
        <nav class="p-4 text-white bg-gray-800">
            <div class="container flex justify-between items-center mx-auto">
                <a href="#" class="text-lg font-bold">My Blog</a>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    @if (!Auth::check())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif

                    @auth
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endauth
                </ul>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
        <footer class="fixed bottom-0 left-0 p-4 w-full text-center bg-gray-800">
            <p class="text-gray-500">&copy; 2024 My Blog</p>
        </footer>
    </body>

    </html>
