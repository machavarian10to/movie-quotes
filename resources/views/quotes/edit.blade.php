<x-layout>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <x-title name="Edit quote" />

        <div class="">
            <aside class="w-48">
                <h4 class="font-semibold mb-4 text-underline">Links</h4>
                <ul>
                    <x-link name="All quotes" link="{{ route('admin.quotes_show') }}"/>

                    <x-link name="All movies" link="{{ route('admin.movies_show') }}"/>

                    <x-link name="New quote" link="{{ route('admin.quotes_create') }}"/>

                    <x-link name="New movie" link="{{ route('admin.movies_create') }}" class="mt-3"/>
                </ul>
            </aside>
        </div>

        <div class=" sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">

                <form action="{{ route('admin.quotes_update', $quote->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" >
                    @csrf
                    @method('PATCH')
                    <x-input name="title" title="Title" value="{{ old('title', $quote->title)}}" />
                    <x-error type="title" />

                    <div class="">
                        <label for="thumbnail"
                               class="block text-sm font-medium text-gray-700"
                        >Thumbnail</label>
                        <div class="mt-1">
                            <input id="thumbnail" value="{{ old('thumbnail', $quote->thumbnail) }}" name="thumbnail" type="file" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="rounded-xl" width="100">
                    <x-error type="thumbnail" />

                    <div>
                        <label for="movie_id"
                               class="block text-sm font-medium text-gray-700"
                        >Movie</label>
                        <select name="movie_id" id="movie_id">
                            @foreach(\App\Models\Movie::all() as $movie)
                                <option value="{{ $movie->id }}"
                                {{ old('movie_id', $quote->movie_id) === $movie->id ? 'selected' : ''}}>{{ ucwords($movie->name) }}</option>
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
