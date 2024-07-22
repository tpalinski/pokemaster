<x-layout>
    <form method="get" action="/"
    class="bg-orange-800 p-4 rounded-xl flex flex-col justify-center items-center m-2 text-sky-200 text-sm gap-2"
        >
        <label for="search"> Search for your favourite Pokemon </label>
        <input type="text" name="search" id="search" value="{{request()->query("search", "")}}" class="text-black"/>
        <input type="submit" value="Search" class="bg-sky-200 hover:bg-sky-400 border-white rounded-xl p-2 text-red-900"/>
    </form>
    <div class="text-sky-200 flex-col flex justify-center items-center m-4 w-5/12">{{$pokemonData->links()}}</div>
    <div class="w-full grid-cols-4 grid gap-4 p-8">
        @foreach ($pokemonData as $pokemon)
            <x-pokemon-display :pokemon="$pokemon" />
        @endforeach
    </div>
    <div class="text-sky-200 flex-col flex justify-center items-center">{{$pokemonData->links()}}</div>
</x-layout>
