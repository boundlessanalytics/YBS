<!-- resources/views/components/account-form.blade.php -->
<form action="{{ $action }}" method="{{ $method ?? 'POST' }}">
    @csrf

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Account Name</label>
        <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div class="mb-4">
        <label for="type" class="block text-sm font-medium text-gray-700">Account Type</label>
        <select name="type" id="type" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="savings">Savings</option>
            <option value="checking">Checking</option>
            <!-- Add more account types as needed -->
        </select>
    </div>

    <div class="mb-4">
        <label for="balance" class="block text-sm font-medium text-gray-700">Initial Balance</label>
        <input type="number" name="balance" id="balance" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">{{ $submitText }}</button>
</form>
