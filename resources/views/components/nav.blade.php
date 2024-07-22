<nav class="flex flex-row items-center justify-center bg-orange-800 py-4 px-2 my-4 w-full">
    @auth
        <div class="p-2 mx-4 text-sky-200 text-xl absolute left-4 hidden md:block">
            Welcome, {{auth()->user()->name}}
        </div>
        <x-navlink destination="/">
            Homepage
        </x-navlink>
        <x-navlink destination="/favourites">
            Favourites
        </x-navlink>
        <x-navlink destination="/auth/logout">
            Log out
        </x-navlink>
    @endauth

    @guest
        <x-navlink destination="/">
            Homepage
        </x-navlink>
        <x-navlink destination="/login">
            Log in
        </x-navlink>
        <x-navlink destination="/register">
            Register
        </x-navlink>
    @endguest
</nav>
