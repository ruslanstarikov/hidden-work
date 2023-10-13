@extends('company.members.base')

@section('control-window')
<div id="control-window" class="min-h-screen container mx-auto mt-6 px-4">
    <div class="table-control py-2 px-4">
    <h2 class="text-2xl font-bold mb-4">Members of {{ $company->name }}</h2>
        <div class="mb-6">
            <a href="{{ route('company.members.invite.form', $company) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Invite New Member</a>
        </div>
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
            <tr>
                <th class="w-1/4 py-2 px-4 border-b border-gray-200 text-left">Name</th>
                <th class="w-1/4 py-2 px-4 border-b border-gray-200 text-left">Email</th>
                <th class="w-1/4 py-2 px-4 border-b border-gray-200 text-left">Role</th>
                <th class="w-1/4 py-2 px-4 border-b border-gray-200 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $member->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $member->email }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $member->pivot->role_id == 1 ? 'Admin' : 'User' }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a href="{{ route('company.members.edit', [$company, $member]) }}" class="text-blue-500 hover:underline">Edit</a>
                        <button type="button"
                                hx-delete="{{ route('company.members.destroy', ['company' => $company, 'member' => $member]) }}"
                                hx-confirm="Are you sure you want to remove this member?"
                                hx-target="#control-window"
                                hx-push-url="true"
                                hx-swap="true"
                                hx-select="#control-window"
                                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                class="text-red-600 hover:text-red-900">
                            Remove
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-control  py-2 px-4">
    <h2 class="text-2xl font-bold mb-4">Invitations of {{ $company->name }}</h2>
    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
        <tr>
            <th class="w-1/4 py-2 px-4 border-b border-gray-200 text-left">Email</th>
            <th class="w-1/4 py-2 px-4 border-b border-gray-200 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invitations as $invitation)
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">{{ $invitation->email }}</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button type="button"
                            hx-delete="{{ route('company.invitation.destroy', ['company' => $company, 'invitation' => $invitation]) }}"
                            hx-confirm="Are you sure you want to remove this member?"
                            hx-target="#control-window"
                            hx-push-url="true"
                            hx-swap="true"
                            hx-select="#control-window"
                            hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                            class="text-red-600 hover:text-red-900">
                        Remove
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection
