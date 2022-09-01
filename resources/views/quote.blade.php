<x-layout>
    <div class="flex justify-end m-4">
        @auth
            <span class="text-sm text-white uppercase m-3">Welcome, {{ auth()->user()->username }}</span>

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
        <div class="w-6/12 h-90 mt-20 text-white text-center text-3xl">
            <div class="flex justify-center">
                <img src="https://www.infopostalioni.com/wp-content/uploads/2019/05/%E1%83%AF%E1%83%90%E1%83%A0%E1%83%98%E1%83%A1%E1%83%99%E1%83%90%E1%83%AA%E1%83%98%E1%83%A1-%E1%83%9B%E1%83%90%E1%83%9B%E1%83%90.jpg"
                     class="w-8/12 h-65"
                />
            </div>

            <h4 class="my-10">{{ $quote->title }}</h4>
            <a href="/movies/{{ $quote->movie->slug }}">
                <h3 class="underline">{{ $quote->movie_name }}</h3>
            </a>
        </div>
    </div>
</x-layout>

