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
    </head>
    <body class="font-sans antialiased bg-yellow-400 flex flex-col items-center">
        <img src="{{asset("img/logo.png")}}" alt="Pokemaster logo" />
        <div class="text-sky-200 flex-col flex justify-center items-center m-4 w-5/12">{{$pokemonData->links()}}</div>
        <div class="w-full grid-cols-4 grid gap-4 p-8">
            @foreach ($pokemonData as $pokemon)
                <x-pokemon-display :pokemon="$pokemon" />
            @endforeach
        </div>
        <div class="text-sky-200 flex-col flex justify-center items-center">{{$pokemonData->links()}}</div>
    </body>
</html>
