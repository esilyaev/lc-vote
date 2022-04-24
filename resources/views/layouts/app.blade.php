<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LC - Vote</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans text-gray-900 text-sm bg-gray-background">
    <div class="min-h-screen">


        <!-- Page Heading -->
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#"><img src="{{ asset('img/logo.svg') }}" alt=""></a>
            <div class="flex items-center">
                @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form> @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" class="w-10 h-10 rounded-full" />
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="container flex mx-auto max-w-custom">
            <div class="w-70 mr-5">
                <div class="add-idea border-2 border-blue-500 mt-16 rounded-xl text-gray-900 bg-white">
                    <div class="add-idea-title text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        @auth
                        <p class="text-xs mt-4">
                            Let us know what you would like and we'll take a look over!</p>
                        @endauth
                        @guest
                        <p class="text-xs mt-4">
                            Please login to create idea.</p>
                        @endguest
                    </div>
                    @auth
                    <livewire:create-idea />
                    @endauth
                    @guest
                    <div class="text-center my-6 space-y-6 py-2 px-4">
                        <a href="{{ route('login') }}" class=" inline-block text-white justify-center bg-blue-500 rounded-xl border border-blue-500 px-6 py-3 w-1/2 h-11 font-semibold
              hover:bg-blue-700 transition duration-150 ease-in">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="inline-block text-white justify-center bg-gray-400 rounded-xl border border-gray-400 px-6 py-3 w-1/2 h-11 font-semibold
              hover:bg-gray-700 transition duration-150 ease-in">
                            Register
                        </a>
                    </div>
                    @endguest

                </div>
            </div> <!-- end add-idea -->

            <div class="w-175">
                <livewire:status-filters />
                <div class="mt-8">
                    {{ $slot }}
                </div>

            </div>

        </main>
    </div>
    @livewireScripts
</body>

</html>