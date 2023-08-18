<!-- the cart component for small devices -->
<a class="text-gray-700 dark:hover:text-gray-500 pr-6 md:hidden dark:text-gray-300" href="{{ route('cart') }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span class="flex absolute -mt-7 ml-3 ">
        @if (session('cartProducts'))
            <span class="animate-ping absolute inline-flex h-8 w-8 rounded-full bg-pink-400 opacity-75  "></span>

            <span class="relative inline-flex rounded-full h-7 w-7 bg-pink-500 text-center"><span id="totalQuantitySM"
                    class="ml-2 mt-1 text-gray-200 dark:text-gray-950">{{ session()->get('quantityTotal') }}</span>
            </span>
        @else
            <span id="cartAnimationSM"></span>
            <span id="cartIndictorSM">
                <span id="totalQuantitySM"></span>
            </span>
        @endif
    </span>
</a>
