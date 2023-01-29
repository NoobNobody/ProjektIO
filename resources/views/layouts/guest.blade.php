<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="bg-white shadow-md" x-data="{ isOpen: false }">
        <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-700 to-gray-800 md:text-2xl"
                    href="/">
                    WypoBudo
                </a>
                <div @click="isOpen = !isOpen" class="flex md:hidden">
                    <button type="button"
                        class="text-gray-400 hover:text-gray-800 focus:outline-none focus:text-gray-800"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <div :class="isOpen ? 'flex' : 'hidden'"
                class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-red-700 to-gray-800 hover:text-yellow-600"
                    href="{{ route('guestcategories') }}">Kategorie</a>
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-red-700 to-gray-800 hover:text-yellow-600"
                    href="{{ route('guestproduct') }}">Produkty</a>
                @if (Route::has('login')) @auth
                @else
                    <a href="{{ route('login') }}"
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-700 to-gray-800 hover:text-yellow-600">Logowanie</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-transparent bg-clip-text bg-gradient-to-r from-red-700 to-gray-800 hover:text-yellow-600">Rejestracja</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
</div>
<div class="font-sans text-gray-900 antialiased min-h-screen">
    {{ $slot }}
</div>
<footer class="bg-gray-800 border-t border-gray-200">
    <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
    </div>
</footer>
</body>

</html>
