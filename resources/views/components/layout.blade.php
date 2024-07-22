<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pokemaster</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
    </head>
    <body class="font-sans antialiased bg-yellow-400 flex flex-col items-center">
        <img src="{{asset("img/logo.png")}}" alt="Pokemaster logo" />
        <x-nav> </x-nav>
        <div class="flex-col flex items-center w-full">
            {{$slot}}
        </div>
    </body>
</html>
