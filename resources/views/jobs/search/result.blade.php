<div class="max-w-lg mx-auto my-10 p-6 bg-white rounded-xl shadow-md flex items-center space-x-4">
    <div class="flex-shrink-0">
        <!-- You can place an image or an icon here -->
    </div>
    <div>
        <a href="/job/{{ $job->id }}" class="text-xl font-medium text-black hover:text-blue-600">{{ $job->title }}</a>
        <p class="text-gray-500 mt-1">Company: {{ $job->company }}</p>
        <p class="text-gray-500">Location: {{ $job->location }}</p>
        <p class="text-gray-500">Type: {{ $job->scope }}</p>
        <p class="text-gray-500 mt-2">{{ Str::limit($job->description, 100, $end='...') }}</p>
    </div>
</div>
