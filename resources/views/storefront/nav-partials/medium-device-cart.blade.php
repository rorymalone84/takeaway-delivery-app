<a class="flex items-center text-gray-700 dark:text-gray-200 dark:hover:text-gray-200 pr-6 dark:"
    href="{{ route('cart') }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span class="flex absolute -mt-5 ml-2">
        <!-- php session cart data -->
        @if (session('cartProducts'))
            <span
                class="animate-ping absolute inline-flex h-8 w-8 rounded-full bg-pink-500 dark:bg-pink-400 opacity-75  "></span>

            <span class="relative inline-flex rounded-full h-7 w-7 bg-pink-500 dark:bg-pink-400  text-center"><span
                    id="totalQuantityMD"
                    class="ml-1.5 text-gray-100 dark:text-gray-950">{{ session()->get('quantityTotal') }}</span>
            </span>
        @else
            <!-- Jquery update cart before refresh -->
            <span id="cartAnimationMD"></span>
            <span id="cartIndictorMD">
                <span id="totalQuantityMD"></span>
            </span>
        @endif
    </span>
</a>
