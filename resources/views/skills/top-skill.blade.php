<div id="skills-section" class="mt-4">
    <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
    <div class="relative">
        <input type="text" id="skills-input" name="q" placeholder="Start typing a skill..." class="form-input"
               hx-get="/skills/search/{{ $domain }}"
               hx-trigger="keyup changed delay:200ms"
               hx-indicator="#loading-indicator"
               hx-swap="#skills-dropdown" hx-target="#skills-dropdown"
        />
        <div id="skills-dropdown" class="absolute z-10 mt-2 w-full"></div>
        <span id="loading-indicator" class="hidden">Loading...</span>
    </div>

    @include('skills.skill', ['skills' => $skills])
</div>
