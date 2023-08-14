@php
    $price = 0;
    $delivery = Session::get('delivery_price');
@endphp

<x-storefront>
    <div class="md:mx-auto md:w-4/5">
        <h1 class="text-center md:text-left text-5xl text-gray-300 font-bold pt-12 mb-4">
            Shopping Cart
        </h1>
        <hr class="border-1 border-gray-300">

        <x-table.table :headers="['Name', 'Price', 'Quantity', 'Total', 'Delete']">
            @if (session('cartProducts'))
                @foreach (session('cartProducts') as $key => $value)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <x-table.table-data>
                                {{ $value['title'] }}
                            </x-table.table-data>
                            <x-table.table-data>
                                £ {{ $value['price'] }}
                            </x-table.table-data>
                            <x-table.table-data>
                                <select id="quantity" data-id="{{ $value['id'] }}">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}"
                                            {{ $value['quantity'] == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </x-table.table-data>
                            <x-table.table-data>
                                <div class="text-sm text-gray-900" name="price"
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

        <div class="mx-auto w-4/5">
            <h1 class="text-center text-2xl text-gray-300 font-bold pt-4">
                Total Cost
            </h1>
        </div>

        @if (session('cartProducts'))
            <x-table.table :headers="['Price', 'Delivery', 'Total']">
                <tbody class="bg-white divide-y divide-gray-200">
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
            <h1 class="text-1xl font-bold tracking-tight text-gray-200 sm:text-1xl">All Good?</h1>
            <p class="mt-6 text-lg leading-8 text-gray-200">Proceed to...</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('orders.checkout') }}"
                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</a>
                <a href="{{ url()->previous() }}" class="text-sm font-semibold leading-6 text-gray-200">Go Back <span
                        aria-hidden="true">→</span></a>
            </div>
        </div>

    </div>
</x-storefront>
