@php
    $price = 0;
    $delivery = Session::get('nearestStore')->delivery_price;
@endphp

<x-storefront>
    <div class="mx-auto w-4/5 bg-orange-100 dark:bg-slate-800 rounded-lg pt-12">
        <h1 class="text-2xl text-gray-700 dark:text-gray-200 pl-6">
            Shopping Cart
        </h1>

        <x-table.table :headers="['Name', 'Price', 'Quantity', 'Total', 'Delete']">
            @if (session('cartProducts'))
                @foreach (session('cartProducts') as $key => $value)
                    <tbody class="bg-orange-50 divide-y divide-gray-200 dark:bg-slate-900 dark:divide-slate-200">
                        <tr>
                            <x-table.table-data>
                                {{ $value['title'] }}
                            </x-table.table-data>
                            <x-table.table-data>
                                £ {{ $value['price'] }}
                            </x-table.table-data>
                            <x-table.table-data>
                                <select id="quantity" data-id="{{ $value['id'] }}"
                                    class="dark:bg-slate-700 dark:text-slate-300">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}"
                                            {{ $value['quantity'] == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </x-table.table-data>
                            <x-table.table-data>
                                <div class="text-sm text-gray-900 dark:text-gray-200" name="price"
                                    value="{{ $value['quantity'] * $value['price'] }}">
                                    £ {{ $value['quantity'] * $value['price'] }}
                                </div>
                            </x-table.table-data>
                            <x-table.table-data>
                                <a role="button" id="delete" data-id="{{ $value['id'] }}"
                                    class="text-red-600 hover:text-red-900">Delete</a>
                            </x-table.table-data>
                        </tr>
                    </tbody>

                    @php
                        $price += $value['price'] * $value['quantity'];
                        $total = $price + $delivery;
                    @endphp
                @endforeach
            @else
                <td align="left" colspan="3">
                    <p class="font-bold text-l text-gray-300 py-6 px-4">
                        Shopping cart is empty.
                    </p>
                </td>
            @endif
        </x-table.table>

        <div class=" bg-orange-100 dark:bg-slate-800 rounded-lg pt-2">
            <h1 class="text-2xl text-gray-700 dark:text-gray-200 pl-6">
                Total Cost
            </h1>
        </div>

        @if (session('cartProducts'))
            <x-table.table :headers="['Price', 'Delivery', 'Total']">
                <tbody class="bg-orange-50 divide-y divide-gray-200 dark:bg-slate-900 dark:divide-slate-200">
                    <tr>
                        <x-table.table-data>
                            £{{ $price }}
                        </x-table.table-data>
                        <x-table.table-data>
                            £{{ $delivery }}
                        </x-table.table-data>
                        <x-table.table-data>
                            £{{ $total }}
                        </x-table.table-data>
                    </tr>
                </tbody>
            @else
        @endif
        </x-table.table>

        <div class="text-center p-8">
            <p class="text-2xl text-gray-700 dark:text-gray-200 pl-6">Proceed to...</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('orders.checkout') }}"
                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</a>
                <a href="{{ url()->previous() }}"
                    class="text-sm font-semibold leading-6 text-gray-700 dark:text-gray-200">Go Back <span
                        aria-hidden="true">→</span></a>
            </div>
        </div>

    </div>
</x-storefront>
