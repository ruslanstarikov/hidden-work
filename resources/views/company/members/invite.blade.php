@extends('company.members.base')
@section('control-window')
<div id="control-window" class="min-h-screen container mx-auto mt-6 px-4 max-w-xl w-full space-y-8 bg-white p-6 rounded shadow-md">
    <h1 class="text-2xl mb-5">Send Invitations</h1>

    <form action="{{ route('company.members.invite', [$company]) }}" method="post">
        @csrf
        <div id="email-fields">
            <div class="email-field mb-4">
                <label for="emails[]" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="emails[]" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </div>
        <button hx-get="{{ route('company.members.invite.form', [$company]) }}"
                hx-target=".email-field:last-of-type"
                hx-swap="afterend"
                hx-select=".email-field"
            type="button" id="addMoreEmails" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add More Emails</button>

        <button
                hx-post="{{ route('company.members.invite', ['company' => $company]) }}"
                hx-target="#control-window"
                hx-push-url="true"
                hx-swap="outerHTML"
                hx-select="#control-window"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
            type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Send Invitations</button>
    </form>
</div>
@endsection
