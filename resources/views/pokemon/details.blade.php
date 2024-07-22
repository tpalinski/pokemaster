@php
    /** @var bool $isFavourite */
    /** @var App\Models\Pokemon $pokemonData */
    $buttonText = $isFavourite ? "Unfavourite" : "Favourite";
@endphp

<x-layout>
        <div class="flex items-center justify-center gap-12 bg-orange-800 text-sky-200 w-5/6 py-12 rounded-2xl">
            <div class="flex flex-col gap-4 items-center w-2/5 justify-start">
                <h2 class="text-2xl"> Pokemon {{$pokemonData->apiId}} </h2>
                <div class="text-xl"> Name: {{$pokemonData->name}}</div>
                @auth
                    <form method="post" action="{{"/pokemon/".$pokemonData->apiId}}">
                        @method('PUT')
                        @csrf
                        <input type="submit" value="{{$buttonText}}"
                        class="bg-sky-200 hover:bg-sky-400 text-red-900 py-2 px-4 rounded-2xl"
                        >
                    </form>
                @endauth
            </div>
            <div class="flex flex-col w-full gap-2 items-center justify-center">
                <div class="bg-sky-800 border-black p-2 rounded-2xl"><img src="{{$pokemonData->image}}" alt="Photo of the pokemon"/></div>
                <div> Hp: {{$pokemonData->hp}}</div>
                <div> Speed: {{$pokemonData->speed}}</div>
                <div> Attack: {{$pokemonData->atk}}</div>
                <div> Defense: {{$pokemonData->def}}</div>
            </div>
        </div>
</x-layout>
