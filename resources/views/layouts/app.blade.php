<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 grid md:grid-cols-12 md:grid-rows-[80px_minmax(400px,_1fr)]">
            <div class="item col-span-full bg-white text-center">
                @include('layouts.header')
            </div>
            <div class="item md:col-span-2 bg-slate-900 p-3">
                @include('layouts.navigation')
            </div>
            <div class="item md:col-span-10 bg-slate-200 p-3">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="p-3">
                        {{ $header }}
                    </header>
                @endif
                <!-- Page Content -->
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
    </body>
</html>
