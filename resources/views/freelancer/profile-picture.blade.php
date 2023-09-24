<div id="avatar-section" class="relative w-32 h-32 overflow-hidden rounded-full">
    <form action="{{ route('freelancer.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($image === null)
            <img id="profile-image-preview" src='/images/profile.svg' alt="Profile Image" class="w-full h-full object-cover">
        @else
            <img id="profile-image-preview" src="{{ $image }}" alt="Profile Image" class="w-full h-full object-cover">
        @endif
        <input type="file" name="profile_picture" id="profile-picture-input" class="hidden" hx-post="{{ route('freelancer.update.image') }}" hx-encoding='multipart/form-data' hx-on="change" hx-swap="#avatar-section" hx-target="#avatar-section">
        <!-- Overlay (Shows when hovering over the profile image) -->
        <div class="absolute inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
            <span class="text-white">Change</span>
        </div>

        <!-- This label triggers the file input when clicked -->
        <label for="profile-picture-input" class="absolute inset-0 cursor-pointer"></label>
    </form>
</div>
