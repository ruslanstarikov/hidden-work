<div id="selected-skills" class="mt-2 flex flex-wrap gap-2">
    @foreach($skills as $skill)
        <span class="skill-tag bg-gray-200 rounded px-3 py-1 text-sm mr-2">
            {{ $skill->name }}
            <button hx-delete="/skill/{{ $skill->id }}/{{$domain}}" hx-target="#skills-section">x</button>
            <input type="hidden" name="skills[]" value="{{ $skill->id }}">
        </span>
    @endforeach
</div>
