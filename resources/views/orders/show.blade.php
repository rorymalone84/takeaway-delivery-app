@php
    $subTotal = 0;
@endphp

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <x-table.table :headers="['Product', 'Price', 'Quantity', 'Sub-total']">
        @foreach ($order_products as $order_product)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $order_product->title }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $order_product->price }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $order_product->pivot->quantity }}
                </x-table.table-data>
                <x-table.table-data>
                    @php
                        $itemTotal = $order_product->price * $order_product->pivot->quantity;
                    @endphp
                    {{ $itemTotal }}
                    @php
                        $subTotal += $itemTotal;
                    @endphp
                </x-table.table-data>
            </tr>
        @endforEach
    </x-table.table>
    <x-table.table :headers="['Items Cost', 'Delivery', 'Total']">
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <x-table.table-data>
                {{ $subTotal }}
            </x-table.table-data>
            <x-table.table-data>
                {{ $order->delivery_price }}
            </x-table.table-data>
            <x-table.table-data>
                {{ $subTotal + $order->delivery_price }}
            </x-table.table-data>
        </tr>
    </x-table.table>

    <div class="text-center p-8">
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ url()->previous() }}"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
                Back</a>
        </div>
    </div>

</x-admin-layout>
