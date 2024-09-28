@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md" x-data="{ showDetails: false }">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Transaction Details</h2>

        <div class="mb-4">
            <p><strong>Description:</strong> {{ $transaction->description }}</p>
            <p><strong>Amount:</strong> {{ $transaction->amount }}</p>
            <p><strong>Date:</strong> {{ $transaction->date }}</p>
            <p><strong>Type:</strong> {{ $transaction->type }}</p>
        </div>

        <!-- Toggle Extra Transaction Details -->
        <div class="mb-4">
            <button @click="showDetails = !showDetails" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                Toggle Extra Details
            </button>

            <div x-show="showDetails" class="mt-4">
                <p><strong>Additional Info:</strong> Lorem ipsum dolor sit amet.</p>
                <!-- Add more details as required -->
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('transactions.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                Back to Transactions
            </a>
        </div>
    </div>
@endsection
