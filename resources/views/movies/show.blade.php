<x-layout>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <x-title name="All movies" />

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

        <div class="px-4 sm:px-6 lg:px-8 mt-7">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <tbody class="divide-y divide-gray-200 bg-white">

                            @foreach($movies as $movie)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-900">
                                                <p>
                                                    {{ $movie->name_en }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{ route('admin.movies_edit', $movie->id) }}" class="text-blue-500 hover:text-blue-500">Edit</a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <form method="POST" action="{{ route('admin.movies_destroy', $movie->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

</x-layout>


