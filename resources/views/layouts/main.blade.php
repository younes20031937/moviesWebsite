<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Fraja</title>
    @vite('resources/css/app.css')
    {{-- @livewireStyles --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans text-white bg-gray-900">

    <!-- Toggle dark and light mode
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" value="" class="sr-only peer">
        <div
            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
        </div>
        <span class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300">Switch</span>
    </label>
-->

@if (!in_array(Route::currentRouteName(), ['auth.login', 'auth.register']))
        @include('navbar')
    @endif
    {{-- @include("navbar") --}}
    @yield('content')
    @yield('nowPlayingMovies')
    @yield('show')
    @yield("popularActors")
    {{-- <script>
        // Example script to toggle dark mode
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            // Save the preference using AJAX or form submission
        }
    </script> --}}
    {{-- @livewireScripts --}}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
