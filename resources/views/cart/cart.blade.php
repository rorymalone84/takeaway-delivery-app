@php
    $price = 0;
    $delivery = Session::get('delivery_price');
@endphp

<x-storefront>
<div class="mx-auto w-4/5">
    <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-4">
        Shopping Cart
    </h1>
    <hr class="border-1 border-gray-300">
</div>

<x-table.table :headers="['Name','Price','quantity','total','delete']">
    @if (session('cartProducts'))
        @foreach (session('cartProducts') as $key => $value)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm text-right font-medium text-gray-900">
                                {{ $value['title'] }}
                            </div>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <span 
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        £ {{ $value['price'] }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <form action="{{ route('update.cart', $key) }}" method="PUT">
                        @csrf
                        <select name="quantity" id="quantity"  onchange="this.form.submit()">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ $value['quantity'] == $i ? 'selected' : ''}}>
                                    {{ $i }} 
                                </option>
                            @endfor
                        </select>
                    </form>
                </td>                            
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900" name="price" value="{{ $value['quantity'] * $value['price'] }}">
                        £ {{ $value['quantity'] * $value['price'] }} 
                    </div>
                </td>

                <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                    <a href="{{ route('delete.from.cart', $key) }}" role="button" class="text-red-600 hover:text-red-900">Delete</a>
                </td>
            </tr>
        </tbody>

        @php
            $price += $value['price'] * $value['quantity'];
            $total = $price + $delivery
        @endphp
        @endforeach

        @else
        <td align="left" colspan="3">
            <p class="font-bold text-l text-black py-6 px-4">
                Shopping cart is empty.
            </p>
        </td>
    @endif
</x-table.table>

<div class="mx-auto w-4/5">
    <h1 class="text-2xl text-center text-gray-800 font-bold pt-4">
        Total Cost
    </h1>
</div>

<x-table.table :headers="['Price','Delivery','Total']">
@if (session('cartProducts'))
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            £{{ $price }}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            £{{ $delivery}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            £{{ $total }}
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
@else
                    
@endif
</x-table.table>


<div class="text-center p-8">
    <h1 class="text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl">All Good?</h1>
    <p class="mt-6 text-lg leading-8 text-gray-600">Proceed to...</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="{{ route('orders.checkout') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</a>
      <a href="{{url()->previous()}}" class="text-sm font-semibold leading-6 text-gray-900">Go Back <span aria-hidden="true">→</span></a>
    </div>
</div>
</x-storefront>