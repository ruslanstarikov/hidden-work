@extends('base')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-6 rounded shadow-md">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                @if(empty($company))
                    Create a Company
                @else
                    Edit Company
                @endif
            </h2>
        </div>
        @if(empty($company))
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6">
        @else
        <form method="POST"
              hx-put="{{ route('companies.update', ['id' => $company->id]) }}"
              hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
              hx-target="body"
              hx-push-url="true"
              class="mt-8 space-y-6">
        @endif
            @csrf
                <!-- Password Field -->
                <div class="rounded-md shadow-sm -space-y-px mb-2">
                    <div>
                        <label for="name" class="sr-only">Company Name</label>
                        <input id="name" value="{{ $company->name ?? old('name') }}" name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Company Name">
                    </div>
                </div>
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <div class="rounded-md shadow-sm -space-y-px mb-2">
                    <div>
                        <label for="name" class="sr-only">Description</label>
                        <textarea id="description" name="description" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Company Description">{{ $company->description ?? old('description') }}</textarea>
                    </div>
                </div>
                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <div class="rounded-md mb-4">
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-2"> <!-- Added mb-2 for space between label and image -->
                        Avatar Image
                    </label>
                    @include('generic.image', ['image' => $avatar ?? null, 'default_image' => '', 'name' => 'avatar', 'action' => route('companies.update.avatar')])
                </div>
                <div class="rounded-md mb-4">
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-2">
                        Background Image
                    </label>
                    @include('generic.image', ['image' => $background ?? null, 'default_image' => '', 'name' => 'background', 'action' => route('companies.update.background'), 'type' => 'rectangular'])
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        @if(empty($company))
                            Create a Company
                        @else
                            Edit Company
                        @endif
                    </button>
                </div>
        </form>
    </div>
</div>
@endsection
