<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page.title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('components.navbar')
@if (session('success'))
    <div class="flex items-center justify-center w-full">
        <div class="max-w-sm w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    </div>
@endif
<div class="flex items-center justify-center mt-5">
    <div class="w-full max-w-screen-xl bg-white p-8 rounded-lg shadow-lg">
        @yield('title')

        @yield('content')
    </div>
</div>
@yield('javascript')
</body>
</html>
