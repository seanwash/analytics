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
    <body class="p-8 bg-sky-100 text-black dark:bg-neutral-900 dark:text-white">
        @inertia

        <div id="app"></div>
    </body>
</html>
