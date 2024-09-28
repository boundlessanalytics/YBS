@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Create New Account</h2>

        <x-account-form action="{{ route('accounts.store') }}" :method="null" submitText="Create Account">
            <!-- You can add additional content here -->
            <div class="text-red-500">Please fill in all required fields.</div>
        </x-account-form>
    </div>
@endsection
