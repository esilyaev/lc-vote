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
      <div class="w-70 mr-5">
        <div class="add-idea border-2 border-blue-500 mt-16
        rounded-xl text-gray-900 bg-white">
          <div class="add-idea-title text-center px-6 py-2 pt-6">
            <h3 class="font-semibold text-base">Add an idea</h3>
            <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
          </div>
          <form action="#" method="post" class="space-y-4 px-4 py-6">
            <div>
              <input type="text" class="w-full text-sm border-none bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your idea" />
            </div>
            <div class="">
              <select name="" id="" class="w-full text-sm bg-gray-100 rounded-xl border-none px-4 py-2">
                <option value="Option 1">Option 1</option>
                <option value="Option 2">Option 2</option>
                <option value="Option 3">Option 3</option>
                <option value="Option 4">Option 4</option>
              </select>
            </div>
            <div>
              <textarea class="w-full text-sm rounded-xl bg-gray-100 border-none placeholder-gray-900 px-4 py-2" name="idea-description" id="idea-description" cols="30" rows="4" placeholder="Discribe your idea"></textarea>
            </div>
            <div class="flex items-center justify-between space-x-3">
              <button class="flex items-center bg-gray-100 rounded-xl border border-gray-100 px-6 py-3 w-1/2 h-11 font-semibold
              hover:border-gray-400 transition duration-150 ease-in">
                <svg class="w-5 text-gray-900 -rotate-45 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span class="ml-1">Attach</span>
              </button>
              <button class="flex items-center text-white bg-blue-500 rounded-xl border border-blue-500 px-6 py-3 w-1/2 h-11 font-semibold
              hover:bg-blue-700 transition duration-150 ease-in">

                <span class="ml-2">Submit</span>
              </button>
            </div>
          </form>
        </div>
      </div> <!-- end add-idea -->
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