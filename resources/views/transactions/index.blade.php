<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold text-gray-700 mb-4">All Transactions</h2>

        <table class="table-auto w-full bg-white shadow-sm rounded-md">
            <thead>
                <tr>
                    <th class="px-4 py-2">Debit Account</th>
                    <th class="px-4 py-2">Credit Account</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td class="border px-4 py-2">{{ $transaction->debitAccount->name }}</td>
                        <td class="border px-4 py-2">{{ $transaction->creditAccount->name }}</td>
                        <td class="border px-4 py-2">{{ $transaction->amount }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
