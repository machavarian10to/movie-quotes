<x-layout>

    <x-language-buttons />

    <div class="flex justify-center items-center">
        <div>
            <h1 class="text-white text-5xl my-20 ">{{ $movie->name }}</h1>

            <div class="max-w-3xl bg-white rounded-lg ">
                @foreach($movie->quote as $quote)
                    <img class="rounded-t-lg" src="https://www.infopostalioni.com/wp-content/uploads/2019/05/%E1%83%AF%E1%83%90%E1%83%A0%E1%83%98%E1%83%A1%E1%83%99%E1%83%90%E1%83%AA%E1%83%98%E1%83%A1-%E1%83%9B%E1%83%90%E1%83%9B%E1%83%90.jpg" alt="">
                    <div class="py-8 px-4">
                        <p class="mb-3 font-normal text-4xl text-gray-700 dark:text-gray-400"
                        >{{ $quote->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-layout>

