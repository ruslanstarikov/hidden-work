@extends('base')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full ml-10 mr-10 rounded">
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($companies as $company)
                <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                    <div class="flex flex-1 flex-col p-8">
                        <div class="relative">
                            <img class="object-cover company-background mx-auto max-h-32 overflow-hidden w-full flex-shrink-0" src="{{ $company->background }}" alt="">
                            <img class="object-cover company-avatar absolute top-2 left-1/2 transform -translate-x-1/2 h-20 w-20 flex-shrink-0 rounded-full" src="{{ $company->avatar }}" alt="{{ $company->name }} Logo">
                        </div>
                        <h3 class="mt-6 text-sm font-medium text-gray-900">{{ $company->name }}</h3>
                        <dl class="mt-1 flex flex-grow flex-col justify-between">
                            <dt class="sr-only">{{ $company->name }}</dt>
                            <dd class="text-sm text-gray-500">{{ $company->description }}</dd>
                            <dt class="sr-only">Role</dt>
                        </dl>
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="flex w-0 flex-1">
                                <a href="{{ route('company.members.index', $company) }}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    Manage Users
                                </a>
                            </div>
                            <div class="-ml-px flex w-0 flex-1">
                                <a href="{{ route('companies.edit', $company) }}" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
