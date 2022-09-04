<x-layout>
    <div class="flex justify-end m-4">
        @auth
            <span class="text-md text-white uppercase m-3">Welcome, {{ auth()->user()->username }}</span>

            <a class="text-md text-blue-300 uppercase m-3" href="{{ route('admin.quotes_show') }}">Dashboard</a>
            <form method="POST" action="{{ route('logout.destroy') }}">
                @csrf

                <button type="submit" class="px-10 py-2 bg-blue-500 text-white rounded-md
                hover:bg-blue-500 hover:drop-shadow-md duration-300 ease-in"
                >Log out</button>
            </form>
        @else
            <a href="{{ route('login.create') }}" class=" px-10 py-2 bg-blue-500 text-white rounded-md
                hover:bg-blue-500 hover:drop-shadow-md duration-300 ease-in">
                Log In
            </a>
        @endauth
    </div>

    <x-language-buttons />

    <div class="flex justify-center items-center">
        <div class="text-white text-center font-sansation text-5xl flex flex-col items-center">
            <div class="flex justify-center w-[700px] h-[386px] mt-12">
                <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="w-full h-full"/>
            </div>

            <h4 class="my-[65px]">{{ $quote->title }}</h4>
            <a href="/movies/{{ $quote->movie->slug }}">
                <h3 class="underline">{{ $quote->movie->name }}</h3>
            </a>
        </div>
    </div>
</x-layout>

