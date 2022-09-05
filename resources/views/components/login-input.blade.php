@props(['name', 'title'])

<div class="w-[700px] h-[100px] flex flex-col space-y-2">
    <label class="text-xl font-light" for="{{ $name }}">{{ ucwords($title) }}</label>
    <input class="w-full h-12 px-3 py-2 rounded-md border border-slate-400 text-xl"
           type="{{ $name }}"
           placeholder="{{ $title }}..."
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
    >
</div>
