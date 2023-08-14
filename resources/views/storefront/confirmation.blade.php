<x-storefront>
    <div class="mx-auto w-4/5">
        <h2 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
            Order Complete
        </h2>
        <hr class="border-1 border-gray-300">
        <div class="flex flex-wrap -mx-3 m-6">
            Thank you {{ $order->customer_name }}
        </div>
    </div>
    <div class="mx-auto w-4/5">
        <h3 class="text-2xl text-gray-800 font-bold pt-12 mb-8">
            Your order
        </h3>
        @foreach ($order_products as $order_product)
            {{ $order_product->title }}
            {{ $order_product->pivot->quantity }}
        @endforeach
        <h3 class="text-2xl text-gray-800 font-bold pt-12 mb-8">
            Delivering to
        </h3>
        @foreach ($order_products as $order_product)
            {{ $order->customer_address }}
            <br>
            {{ $order->customer_city }}
        @endforeach

        <hr class="border-1 border-gray-300">

        <hr class="border-1 border-gray-300">
        <div class="flex flex-wrap -mx-3 m-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Order Cost: £{{ $order->total_price - $order->delivery_price }}
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Delivery Cost: £{{ $order->delivery_price }}
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Total Cost: £{{ $order->total_price }}
            </div>
        </div>
    </div>

    <div class="text-center p-8">
        <h1 class="text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl">All Good?</h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Proceed to...</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Return
                to Store</a>
        </div>
    </div>
</x-storefront>
