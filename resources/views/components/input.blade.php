@props(['name', 'title'])

<div>
    <label for="{{ $name }}"
           class="block text-sm font-medium text-gray-700"
    >{{ $title }}</label>
    <div class="mt-1">
        <input {{ $attributes(['value' => old($name)]) }} id="{{ $name }}" name="{{ $name }}" type="text"  required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
    </div>
</div>
