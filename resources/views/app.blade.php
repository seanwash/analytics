<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name') }}</title>

        <x-favicon />

        @routes
        @vite(['resources/css/app.css', 'resources/js/app.tsx'])

        @inertiaHead
    </head>
    <body class="
        min-h-screen p-8
        bg-gradient-to-b from-white to-slate-200 text-black
        dark:from-slate-600 dark:to-slate-900 dark:text-white
    ">
        @inertia

        <div id="app"></div>
    </body>
</html>
