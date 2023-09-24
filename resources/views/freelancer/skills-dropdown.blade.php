<div id="skills-dropdown">
    @if ($skills->count())
        <ul class="bg-white border rounded shadow-md">
            @foreach($skills as $skill)
                <li class="p-2 hover:bg-gray-200 cursor-pointer"
                    hx-post="/skill/{{ $skill->id}}"
                    hx-target="#skills-section"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                >

                    {{ $skill->name }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="bg-white p-2 border rounded shadow-md">No skills found</div>
    @endif
</div>
