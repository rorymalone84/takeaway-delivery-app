<x-storefront>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <x-table.table :headers="['Order_id', 'Order date', 'products', 'delivery cost', 'cost', 'status', 'order again']">
        @foreach ($previous_orders as $previous_order)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $previous_order->id }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $previous_order->created_at }}
                </x-table.table-data>
                <x-table.table-data>
                    @foreach ($previous_order->products as $product)
                        <li>{{ $product->title }} ({{ $product->pivot->quantity }} x £{{ $product->price }})</li>
                    @endforeach
                </x-table.table-data>
                <x-table.table-data>
                    £{{ $previous_order->delivery_price }}
                </x-table.table-data>
                <x-table.table-data>
                    £{{ $previous_order->total_price }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $previous_order->status }}
                </x-table.table-data>
                <x-table.table-data>
                    <a href="{{ route('reorder.to.cart', $previous_order->id) }}" event.preventDefault()
                        @click="return false;"
                        class="px-6 py-2 text-l uppercase text-white font-bold bg-blue-600 rounded-full w-full">
                        +
                    </a>
                </x-table.table-data>
            </tr>
        @endforeach
    </x-table.table>
</x-storefront>
