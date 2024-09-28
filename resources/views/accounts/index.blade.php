<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Accounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white shadow-md rounded-md">
                    <table class="table-auto w-full bg-white shadow-sm rounded-md">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Account Name</th>
                                <th class="px-4 py-2">Account Type</th>
                                <th class="px-4 py-2">Balance</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td class="border px-4 py-2">{{ $account->name }}</td>
                                    <td class="border px-4 py-2">{{ $account->type }}</td>
                                    <td class="border px-4 py-2">{{ $account->balance }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('accounts.edit', $account->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
