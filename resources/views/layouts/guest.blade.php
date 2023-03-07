<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Avlanche Student Management System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-700 antialiased">
<div class="font-sans text-gray-900 antialiased">
    <main>
        <section class="relative w-full h-full py-40 min-h-screen">
            <div class="absolute top-0 w-full h-full bg-slate-800 bg-full bg-no-repeat" style="background-image: url({{ asset('images/register_bg_2.png') }})"></div>

            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    {{ $slot }}
                </div>
            </div>

        </section>
    </main>
</div>
</body>
</html>
