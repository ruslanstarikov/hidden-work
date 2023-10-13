@if(!empty($type) && $type == 'rectangular')
    <div id="{{$name}}-section" class="relative w-96 h-32 overflow-hidden">
@else
    <div id="{{$name}}-section" class="relative w-32 h-32 overflow-hidden rounded-full">
@endif
    <div>
        @csrf
        @if($image === null)
            <img id="profile-image-preview" src='{{ $default_image }}' alt="Profile Image" class="w-full h-full object-cover">
        @else
            <img id="profile-image-preview" src="{{ $image }}" alt="Profile Image" class="w-full h-full object-cover">
        @endif
        <input type="file" name="{{ $name }}" id="{{ $name }}-input" class="hidden" hx-post="{{ $action }}" hx-encoding='multipart/form-data' hx-on="change" hx-swap="#{{ $name }}-section" hx-target="#{{ $name }}-section">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
            <span class="text-white">Change</span>
        </div>

        <!-- This label triggers the file input when clicked -->
        <label for="{{ $name }}-input" class="absolute inset-0 cursor-pointer"></label>
    </div>
</div>
