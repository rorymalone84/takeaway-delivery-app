<!-- index for the orders section of the admin area -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="m-2 p-2 bg-green-600 text-green-50 rounded-lg">
        <a href="{{ route('orders.create') }}">Add Order</a>
    </div>

    <x-table.table :headers="['Order ID', 'Customer', 'Address', 'Action']">
        @foreach ($orders as $order)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $order->id }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $order->customer_name }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $order->customer_address }}
                </x-table.table-data>
                <x-table.table-data>
                    <a href="{{ route('orders.show', $order->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </x-table.table-data>
            </tr>
        @endforeach
    </x-table.table>
</x-admin-layout>
