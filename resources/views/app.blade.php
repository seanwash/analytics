<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <x-favicon />

        @routes
        @vite(['resources/js/app.ts', 'resources/css/app.css'])

        @inertiaHead
    </head>
    <body class="p-8 bg-sky-100 text-black dark:bg-sky-900 dark:text-white">
        @inertia

        <div id="app"></div>
    </body>
</html>
