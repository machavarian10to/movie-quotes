@props(['name', 'link'])

<li class="mt-2">
    <a href="{{ $link }}" class="text-white hover:text-indigo-400">{{ $name }}</a>
</li>
