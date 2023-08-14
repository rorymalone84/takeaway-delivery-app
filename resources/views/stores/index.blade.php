<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="m-2 p-2 bg-green-600 text-green-50 rounded-lg">
        <a href="{{ route('stores.create') }}">Add New Store</a>
    </div>

    <x-table.table :headers="['name', 'city', 'phone', 'action']">
        @foreach ($stores as $store)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $store->name }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $store->city }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $store->phone }}
                </x-table.table-data>
                <x-table.table-data>
                    <a href="{{ route('stores.edit', $store->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </x-table.table-data>
            </tr>
        @endforeach
    </x-table.table>
</x-admin-layout>
