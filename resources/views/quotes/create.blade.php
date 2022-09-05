<x-layout>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <x-title name="{{__('texts.publish_new_quote')}}" />

        <div class="">
            <aside class="w-48">
                <h4 class="font-semibold mb-4 text-underline">{{__('texts.links')}}</h4>
                <ul>
                    <x-link name="{{__('texts.all_quotes')}}" link="{{ route('admin.quotes_show') }}"/>

                    <x-link name="{{__('texts.all_movies')}}" link="{{ route('admin.movies_show') }}"/>

                    <x-link name="{{__('texts.new_quote')}}" link="{{ route('admin.quotes_create') }}"/>

                    <x-link name="{{__('texts.new_movie')}}" link="{{ route('admin.movies_create') }}" class="mt-3"/>
                </ul>
            </aside>
        </div>

        <div class=" sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">

                <form action="{{ route('admin.quotes_store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" >
                    @csrf
                    <x-input name="title_en" title="{{__('texts.title_english')}}"/>
                    <x-error type="title_en" />

                    <x-input name="title_ka" title="{{__('texts.title_georgian')}}"/>
                    <x-error type="title_ka" />

                    <div>
                        <label for="thumbnail"
                               class="block text-sm font-medium text-gray-700"
                        >{{__('texts.thumbnail')}}</label>
                        <div class="mt-1">
                            <input id="thumbnail" name="thumbnail" type="file" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <x-error type="thumbnail" />

                    <div>
                        <label for="movie_id"
                               class="block text-sm font-medium text-gray-700"
                        >{{__('texts.movie')}}</label>
                        <select name="movie_id" id="movie_id">
                            @foreach($movies as $movie)
                                <option value="{{ $movie->id }}">{{ ucwords($movie->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-error type="movie_id" />

                    <x-publish-button />
                </form>

            </div>
        </div>
    </div>

</x-layout>
