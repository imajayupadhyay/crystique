<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
    </head>
    <body class="antialiased font-sans" style="background-color: #dcdcdc;">
        @inertia
    </body>
</html>
