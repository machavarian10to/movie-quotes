<x-layout>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <x-title name="Publish new movies" />

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

                <form action="{{ route('admin.movies_store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" >
                    @csrf

                    <x-input name="name_en" title="Movie name(english)"/>
                    <x-error type="name_en" />

                    <x-input name="name_ka" title="Movie name(georgian)"/>
                    <x-error type="name_ka" />

                    <x-input name="slug" title="Slug"/>
                    <x-error type="slug" />

                    <x-publish-button />
                </form>

            </div>
        </div>
    </div>

</x-layout>