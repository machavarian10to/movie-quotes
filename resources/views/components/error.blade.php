@props(['type'])

@error($type)
    <p class="text-xs text-red-500">{{ $message }}</p>
@enderror
