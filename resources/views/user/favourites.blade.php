<x-layout>
    <div class="text-sky-200 flex-col flex justify-center items-center m-4 w-5/12">{{$pokemonData->links()}}</div>
    <div class="w-full md:grid-cols-4 sm:grid-cols-3 grid-cols-2 grid gap-4 p-8">
        @foreach ($pokemonData as $pokemon)
            <x-pokemon-display :pokemon="$pokemon" />
        @endforeach
    </div>
    <div class="text-sky-200 flex-col flex justify-center items-center">{{$pokemonData->links()}}</div>
</x-layout>
