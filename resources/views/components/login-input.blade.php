@props(['name'])

<div class="flex flex-col space-y-2">
    <label class="text-sm font-light" for="$name">{{ ucwords($name) }}</label>
    <input class="w-96 px-3 py-2 rounded-md border border-slate-400"
           type="{{ $name }}"
           placeholder="Your {{ $name }}..."
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
    >
</div>
