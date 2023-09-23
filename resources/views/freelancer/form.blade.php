@extends('base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full space-y-8 bg-white p-6 rounded shadow-md">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Edit Freelancer Profile
                </h2>
            </div>

            <form action="{{ route('freelancer.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Freelancer Picture -->
                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full border-gray-300 rounded-md">
                </div>

                <!-- Full Name -->
                <div class="mt-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" name="name" type="text" required class="mt-1 block w-full border-gray-300 rounded-md">
                </div>

                <!-- Tagline -->
                <div class="mt-4">
                    <label for="tagline" class="block text-sm font-medium text-gray-700">Tagline</label>
                    <input id="tagline" name="tagline" type="text" required class="mt-1 block w-full border-gray-300 rounded-md" placeholder="e.g., Web Developer">
                </div>

                <!-- About -->
                <div class="mt-4">
                    <label for="about" class="block text-sm font-medium text-gray-700">About Me</label>
                    <textarea id="about" name="about" rows="4" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                </div>

                <!-- Skills -->
                <div class="mt-4">
                    <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                    <div class="relative">
                        <input type="text" id="skills-input"  name="q" placeholder="Start typing a skill..." class="form-input"
                               hx-get="/skills/search"
                               hx-trigger="keyup changed delay:200ms"
                               hx-indicator="#loading-indicator"
                               hx-swap="outerHTML"
                               hx-target="#skills-dropdown"/>
                        <div id="skills-dropdown" class="absolute z-10 mt-2 w-full"></div>
                        <span id="loading-indicator" class="hidden">Loading...</span>
                    </div>

                    <div id="selected-skills" class="mt-2 flex flex-wrap gap-2">
                        <!-- Dynamically add selected skills here as tags -->
                    </div>
                </div>


                <!-- Portfolio URL (Example) -->
                <div class="mt-4">
                    <label for="portfolio_url" class="block text-sm font-medium text-gray-700">Portfolio URL</label>
                    <input id="portfolio_url" name="portfolio_url" type="url" class="mt-1 block w-full border-gray-300 rounded-md" placeholder="https://example.com/portfolio">
                </div>

                <!-- Rates -->
                <div class="mt-4">
                    <label for="rates" class="block text-sm font-medium text-gray-700">Hourly Rate ($)</label>
                    <input id="rates" name="rates" type="number" required class="mt-1 block w-full border-gray-300 rounded-md" placeholder="e.g., 50">
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
    <style>
        .hidden {
            display: none;
        }
    </style>
    <script>
        function addSkillTag(skillName) {
            // Check if the skill is already added
            if (document.querySelector(`#selected-skills .skill-${skillName}`)) {
                document.querySelector('#skills-input').value = '';
                document.querySelector('#skills-dropdown').classList.add('hidden');
                return;  // If already added, do nothing
            }

            // Tag template with a remove button
            const tagElement = `
      <span class="inline-block bg-primary-200 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 skill-${skillName}">
        ${skillName}
        <button onclick="removeSkillTag('${skillName}')" class="text-white rounded-full p-1 text-xs">&times;</button>
      </span>`;

            document.querySelector('#selected-skills').innerHTML += tagElement;
            document.querySelector('#skills-dropdown').classList.add('hidden');
            document.querySelector('#skills-input').value = '';
        }

        function removeSkillTag(skillName) {
            const skillElement = document.querySelector(`#selected-skills .skill-${skillName}`);
            if (skillElement) {
                skillElement.remove();
            }
        }

    </script>
@endsection

