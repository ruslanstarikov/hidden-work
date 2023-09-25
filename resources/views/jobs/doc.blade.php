<div id="jobs-form" class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl w-full space-y-8 bg-white p-6 rounded shadow-md">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Post a New Job
            </h2>
        </div>

        @include('generic.success')
        @if(!empty($job))
            <form action="{{ route('jobs.update', ['id' => $job->id]) }}"
                  hx-select="#jobs-form"
                  hx-put="{{ route('jobs.update', ['id' => $job->id]) }}"
                  hx-swap="outerHTML"
                  hx-target="#jobs-form"
                  hx-indicator=".pulse-placeholder"
                  class="space-y-6"
            >
        @else
            <form action="{{ route('jobs.store') }}" hx-post="{{ route('jobs.store') }}" method="POST" class="space-y-6">
        @endif
                @include('generic.pulse')

        @csrf
        <!-- Job Title -->
        <div class="mt-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
            <input id="title" name="title" type="text" required class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $job->title ?? old('title') }}">
            @include('generic.error', ['field' => 'title'])
        </div>

        <!-- Job Description -->
        <div class="mt-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Job Description</label>
            <textarea id="description" name="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md">{{ $job->description ?? old('description') }}</textarea>
            @include('generic.error', ['field' => 'description'])
        </div>

        <!-- Skills -->
        @include('skills.top-skill', ['domain' => 'job'])
        <!-- Project Scope -->
        <div class="mt-4">
            <label for="scope" class="block text-sm font-medium text-gray-700">Project Scope</label>
            <select id="scope" name="scope" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="full_time">Full-Time</option>
                <option value="part_time">Part-Time</option>
                <option value="contract">Contract</option>
            </select>
            @include('generic.error', ['field' => 'scope'])
        </div>

        <!-- Budget -->
        <div class="mt-4">
            <label for="budget_bitcoin" class="block text-sm font-medium text-gray-700">Budget (BTC)</label>
            <input id="budget_bitcoin" name="budget_bitcoin" type="number" step="0.00000001" min="0" required class="mt-1 block w-full border-gray-300 rounded-md" placeholder="e.g., 0.001 BTC" value="{{ $job->budget_bitcoin ?? old('budget_bitcoin') }}">
            @include('generic.error', ['field' => 'budget_bitcoin'])
        </div>

        <!-- Payment Options -->
        <div class="mt-4">
            <label for="payment_options" class="block text-sm font-medium text-gray-700">Payment Options</label>
            <div class="mt-1 block w-full">
                <div class="flex items-center">
                    <input id="payment_bitcoin" name="payment_options[]" type="checkbox" value="bitcoin" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="payment_bitcoin" class="ml-2 block text-sm text-gray-900">Bitcoin</label>
                </div>
                <!-- Add more payment options as required -->
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Post Job
            </button>
        </div>
    </form>
    </div>
    @include('widgets.converter')
</div>
