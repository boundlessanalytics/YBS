<form action="{{ $action }}" method="POST" x-data="transactionForm()">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="mb-4">
        <label for="description" class="block text-gray-700">Description</label>
        <input type="text" id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" x-model="description" required>
    </div>

    <div class="mb-4">
        <label for="amount" class="block text-gray-700">Amount</label>
        <input type="number" id="amount" name="amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" x-model="amount" required>
    </div>

    <div class="mb-4">
        <label for="date" class="block text-gray-700">Date</label>
        <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" x-model="date" required>
    </div>

    <div class="mb-4">
        <label for="type" class="block text-gray-700">Transaction Type</label>
        <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" x-model="type">
            <option value="credit">Credit</option>
            <option value="debit">Debit</option>
        </select>
    </div>

    <template x-for="(item, index) in items" :key="index">
        <div class="mb-4">
            <label class="block text-gray-700">Extra Field</label>
            <input type="text" x-model="items[index]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
    </template>

    <div class="mb-4">
        <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md" @click="addField">Add Field</button>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
            {{ $submitText }}
        </button>
    </div>
</form>

<script>
    function transactionForm() {
        return {
            description: '',
            amount: '',
            date: '',
            type: 'credit',
            items: [],
            addField() {
                this.items.push('');
            }
        }
    }
</script>
