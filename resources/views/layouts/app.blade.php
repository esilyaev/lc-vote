<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>LC - Vote</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
      <div class="w-70 mr-5">Add idea form here ...</div>
      <div class="w-175">
        <nav class="flex items-center justify-between text-xs">
          <div>
            <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
              <li><a href="#" class="border-b-4 pb-3 border-blue-500">All Items (85)</a></li>
              <li><a href="#" class="text-gray-700 transition duration-2  00 ease-in border-b-4 pb-3 hover:border-blue-500">Considering (5)</a></li>
              <li><a href="#" class="text-gray-700 transition duration-2  00 ease-in border-b-4 pb-3 hover:border-blue-500">In progress (17)</a></li>
            </ul>
          </div>
          <div>
            <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3 ">
              <li><a href="#" class="text-gray-700 transition duration-2  00 ease-in border-b-4 pb-3 hover:border-blue-500">Implemented (85)</a></li>
              <li><a href="#" class="text-gray-700 transition duration-2  00 ease-in border-b-4 pb-3 hover:border-blue-500">Closed (5)</a></li>
            </ul>
          </div>
        </nav>
        <div class="mt-8">
          {{ $slot }}
        </div>

      </div>

    </main>
  </div>
</body>

</html>