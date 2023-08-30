<x-storefront>
    <div class="mx-auto w-4/5">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order Complete') }}
            </h2>
        </x-slot>
        <hr class="border-1 border-gray-300">
        <div
            class="p-4 text-2xl text-gray-800 font-bold pt-12 mb-8 bg-orange-100 rounded-3xl dark:bg-slate-800 dark:text-gray-400">
            Thank you {{ $order->customer_name }}
        </div>
    </div>
    <div class="mx-auto w-4/5 bg-orange-100 rounded-3xl p-4 dark:bg-slate-800 dark:text-gray-400">
        <h3 class="text-2xl font-bold pt-12">
            Your order
        </h3>
        <hr class="border-1 border-gray-300 pb-6">
        @foreach ($order_products as $order_product)
            {{ $order_product->title }} x
            {{ $order_product->pivot->quantity }}
            <br>
        @endforeach
        <h3 class="text-2xl font-bold pt-12">
            Delivering to
        </h3>
        <hr class="border-1 border-gray-300 pb-6">
        @foreach ($order_products as $order_product)
            {{ $order->customer_address }}
            <br>
            {{ $order->customer_city }}
        @endforeach

        <h3 class="text-2xl font-bold pt-12">
            Cost
        </h3>
        <hr class="border-1 border-gray-300">

        <div class="flex flex-wrap -mx-3 m-6">
            <div class="w-full md:w-1/2 px-3 ">
                Order Cost: £{{ $order->total_price - $order->delivery_price }}
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                Delivery Cost: £{{ $order->delivery_price }}
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                Total Cost: £{{ $order->total_price }}
            </div>
        </div>
    </div>

    <div class="text-center p-8 text-gray-800 dark:text-gray-200 ">
        <h1 class="text-1xl font-bold tracking-tight sm:text-1xl">All Good?</h1>
        <p class="mt-6 text-lg leading-8">Return to...</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Store</a>
        </div>
    </div>
</x-storefront>
