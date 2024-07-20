@php
    $isFavourite = session()->has($pokemonData->id);
    $buttonText = $isFavourite ? "Unfavourite" : "Favourite";
@endphp


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1 class="text-6xl text-white text-center"> Pokemon details </h1>
        <div class="flex flex-col items-center justify-start text-white">
            Pokemon {{$pokemonData->id}}
            <div> Name: {{$pokemonData->name}}</div>
            <div><img src="{{$pokemonData->sprites->front_default}}" alt="Photo of the pokemon"/></div>
            @foreach ($pokemonData->stats as $stat)
                <div> {{$stat->stat->name}}: {{$stat->base_stat}}</div>
            @endforeach
            <form method="post" action="{{"/pokemon/".$pokemonData->id}}">
                @method('PUT')
                @csrf
                <input type="submit" value="{{$buttonText}}">
            </form>
        </div>
    </body>
</html>
