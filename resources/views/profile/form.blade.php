@extends('blank-base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full space-y-8 bg-white p-6 rounded shadow-md">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Edit Freelancer Profile
                </h2>
            </div>

            <form action="{{ route('freelancer.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Profile Picture -->
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
                    <input id="skills" name="skills" type="text" required class="mt-1 block w-full border-gray-300 rounded-md" placeholder="HTML, CSS, JavaScript">
                    <p class="text-xs text-gray-500 mt-2">Enter skills separated by commas.</p>
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
@endsection
