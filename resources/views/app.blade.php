<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Analytics</title>

        @vite(['resources/js/app.ts', 'resources/css/app.css'])

        @inertiaHead
    </head>
    <body class='bg-sky-100 text-black dark:bg-sky-900 dark:text-white'>
        @inertia

        <div id="app"></div>
    </body>
</html>
