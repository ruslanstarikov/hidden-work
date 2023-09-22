@extends('blank-base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Reset Your Password
                </h2>
            </div>
            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mb-4 space-y-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="mt-8 space-y-6" action="{{ route('password.update', ['token' => $token]) }}" method="POST">
                @csrf

                <!-- Password Reset Token (This is hidden but necessary for verification) -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Field -->
                <div class="rounded-md shadow-sm">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    </div>
                </div>

                <!-- New Password Field -->
                <div class="rounded-md shadow-sm mt-4">
                    <div>
                        <label for="password" class="sr-only">New Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="New Password">
                    </div>
                </div>

                <!-- Confirm New Password Field -->
                <div class="rounded-md shadow-sm mt-4">
                    <div>
                        <label for="password_confirmation" class="sr-only">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Confirm New Password">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
