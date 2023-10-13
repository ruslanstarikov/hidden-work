<nav class="text-gray-500 text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex">
        @foreach ($links as $label => $url)
            @if ($loop->last)
                <li class="flex items-center">
                    <span class="text-gray-700">{{ $label }}</span>
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ $url }}" class="underline">{{ $label }}</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M71.373 247.959l17.748 17.748c4.73 4.73 12.28 4.73 17.011 0L194 177.941V464c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12V177.941l87.867 87.767c4.78 4.78 12.28 4.73 17.011 0l17.748-17.748c4.686-4.686 4.686-12.284 0-16.971L194.059 4.228c-4.734-4.292-12.223-4.343-16.938 0L71.373 231.006c-4.667 4.676-4.667 12.255 0 16.953z"/></svg>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
