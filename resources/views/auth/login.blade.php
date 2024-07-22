<x-layout>
    <h2 class="text-4xl text-red-900 m-8"> Log in to Pokemaster</h2>
    <form action="/auth/login" method="post"
        class="flex-col flex gap-4 items-center bg-sky-200 rounded-2xl p-4"
    >
        @csrf
        <div class="flex gap-4 flex-col p-4 rounded-s items-center justify-center">
            <label for="login"> Login </label>
            <input name="login" id="login" type="text" />
            @error('login')
                <div> {{$message}} </div>
            @enderror
        </div>
        <div class="flex gap-4 flex-col p-4 rounded-s items-center justify-center">
            <label for="password"> Password </label>
            <input name="password" id="password" type="password" />
            @error('password')
                <div> {{$message}} </div>
            @enderror
        </div>
        <input type="submit" value="Log in"
        class="bg-orange-800 text-white py-1 px-4 m-2 rounded-xl hover:bg-orange-600"/>
    </form>
</x-layout>
