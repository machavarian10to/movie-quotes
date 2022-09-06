<x-layout>
    <div class="flex justify-end m-4">
        @auth
            <span class="text-xl text-white uppercase m-3">{{__('texts.welcome')}}, {{ auth()->user()->username }}</span>

            <a class="text-xl text-blue-300 uppercase m-3" href="{{ route('admin.quotes_show') }}">{{__('texts.dashboard')}}</a>
            <form method="POST" action="{{ route('logout.destroy') }}">
                @csrf

                <button type="submit" class="px-10 py-2 bg-blue-500 text-white rounded-md
                hover:bg-blue-500 hover:drop-shadow-md duration-300 ease-in text-2xl"
                >{{__('texts.logout')}}</button>
            </form>
        @else
            <a href="{{ route('login.create') }}" class=" px-10 py-2 bg-blue-500 text-white rounded-md
                hover:bg-blue-500 hover:drop-shadow-md duration-300 ease-in text-2xl">
                {{__('texts.login')}}
            </a>
        @endauth
    </div>

    <x-language-buttons />

    <div class="flex justify-center items-center">
        <div class="text-white text-center text-5xl flex flex-col items-center">
            @if($quote)
                <div class="flex justify-center w-[700px] h-[386px] mt-12">
                    <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="w-full h-full"/>
                </div>
                <h4 class="my-[65px]">{{ $quote->title }}</h4>
                <a href="/movies/{{ $quote->movie->slug }}">
                    <h3 class="underline">{{ $quote->movie->name }}</h3>
                </a>
            @else
                <h3 class="text-7xl mt-44 text-white">There are no quotes</h3>
            @endif
        </div>
    </div>
</x-layout>

