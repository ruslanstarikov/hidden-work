@extends('blank-base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create Your Account
                </h2>
            </div>
            <form action="{{ route('register') }}" method="POST" class="mt-8 space-y-6" hx-post="{{ route('register') }}" hx-target="body">
                @csrf

                <!-- Name Field -->
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Name">
                    </div>
                </div>
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <!-- Email Field -->
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Email">
                    </div>
                </div>
                @error('emails') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <!-- Password Field -->
                <div class="rounded-md shadow-sm -space-y-px mb-2">
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <!-- Confirm Password Field -->
                <div class="rounded-md shadow-sm -space-y-px mb-4">
                    <div>
                        <label for="password_confirmation" class="sr-only">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <select id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm rounded-md">
                        @foreach($countries as $code => $country)
                            <option value="{{ $code }}" style="background-image: url('{{ asset('flags/'.$code.'.png') }}'); background-repeat: no-repeat; background-size: 20px 20px; padding-left: 30px;">
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <a href="{{ route('login') }}" class="text-sm text-gray-600">
                            Already have an account? Log in
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
