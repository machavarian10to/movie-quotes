<x-layout>

    <x-language-buttons />

    <div class="flex justify-center items-center">
        <div>
            <h1 class="text-white text-5xl my-20 ">{{ $movie->name_en }}</h1>

        @foreach($movie->quotes as $quote)
                <div class="w-[748px] h-[533px] bg-white rounded-lg mb-16">
                    <div class="w-[748px] h-[414px]">
                        <img class="w-full h-full rounded-t-md" src="{{ asset('storage/' . $quote->thumbnail) }}" >
                    </div>
                    <div class="py-8 px-4 mb-10">
                        <p class="mb-3 font-normal text-4xl"
                        >{{ $quote->title_en }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-layout>

