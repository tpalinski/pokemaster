@php
    $isFavourite = session()->has($pokemonData->id);
    $buttonText = $isFavourite ? "Unfavourite" : "Favourite";
    /** @var App\Models\Pokemon $pokemonData */
@endphp

<x-layout>
        <div class="flex flex-col items-center justify-start text-black">
            Pokemon {{$pokemonData->apiId}}
            <div> Name: {{$pokemonData->name}}</div>
            <div class="bg-sky-800 border-black p-2 rounded-2xl"><img src="{{$pokemonData->image}}" alt="Photo of the pokemon"/></div>
            <div> Hp: {{$pokemonData->hp}}</div>
            <div> Speed: {{$pokemonData->speed}}</div>
            <div> Attack: {{$pokemonData->atk}}</div>
            <div> Defense: {{$pokemonData->def}}</div>
            <form method="post" action="{{"/pokemon/".$pokemonData->apiId}}">
                @method('PUT')
                @csrf
                <input type="submit" value="{{$buttonText}}">
            </form>
        </div>
</x-layout>
