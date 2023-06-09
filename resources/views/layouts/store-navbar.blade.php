<nav x-data="accordion(6)" x-cloak
    class="fixed top-0 z-40 flex flex-wrap items-center justify-between w-full px-4 py-5 tracking-wide  shadow-md bg-white bg-opacity-90 md:py-8 md:px-8 lg:px-14">
    <!-- Left nav -->
    <div class="flex items-center">
        <a href="#" class="text-3xl tracking-wide">
            Takeaway App
        </a>
    </div>
    <!-- End left nav -->

    <!-- Right nav -->
    <!-- Show menu sm,md -->
    <!-- Toggle button -->

    <div @click="handleClick()" x-data="{ open: false }" class="text-gray-600 cursor-pointer lg:hidden flex flex-row">
        <a class=" hover:text-gray-200 pr-6" href="{{ route('cart') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="flex absolute -mt-7 ml-3 ">
                @if (session('cartProducts'))
                    <span
                        class="animate-ping absolute inline-flex h-8 w-8 rounded-full bg-pink-400 opacity-75  "></span>

                    <span class="relative inline-flex rounded-full h-7 w-7 bg-pink-300 text-center"><span
                            id="totalQuantitySM"
                            class="ml-1.5 mt-1.5 text-gray-950">{{ session()->get('quantityTotal') }}</span>
                    </span>
                @else
                @endif
            </span>
        </a>

        <button @click="open = ! open" class="w-6 h-6 text-lg">
            <svg x-show="! open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                :clas="{ 'transition-full each-in-out transform duration-500': !open }">
                <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <!-- End toggle button -->


    <!-- Toggle menu -->
    <div x-ref="tab" :style="handleToggle()"
        class="relative w-full overflow-hidden transition-all duration-700 lg:hidden max-h-0">
        <div class="flex flex-col my-3 space-y-2 text-lg hover:font-b text-gray-600">
            @auth
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ url('/admin/dashboard') }}" class="hover:text-gray-900"><span>Dashboard</span></a>
                    <hr>
                @endif
                @if (Auth::user()->hasRole('customer'))
                    <a href="{{ url('/customer/dashboard') }}" class="hover:text-gray-900"><span>Previous Orders</span></a>
                    <hr>
                @endif
                <a href="{{ route('profile.edit') }}" class="hover:text-gray-900"><span>My Profile</span></a>
                <hr>
                <span class="text-orange-600">Menu</span>
                @foreach ($categories as $category)
                    <a href="/storefront/{{ Session::get('nearestStore')->id ?? $user->store_id }}#{{ $category->title }}"
                        class="pl-2 text-gray-100 hover:text-gray-100 bg-orange-400  hover:bg-orange-700 rounded"><span>{{ $category->title }}'s</span></a>
                @endforeach
            @else
            @endauth
        </div>
        <div>
            @auth
                <p class="mt-6 text-center text-base font-medium text-gray-500">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Log
                        out</a>
                </form>
                </p>
            @else
                <a href="#"
                    class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700">
                    Sign up
                </a>
                <p class="mt-6 text-center text-base font-medium text-gray-500">
                    Existing customer?
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">
                        Sign in
                    </a>
                </p>
            @endauth
        </div>
    </div>
    <!-- End toggle menu -->
    <!-- End show menu sm,md -->

    <!-- Show Menu lg -->

    <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
        <div class="items-center flex-1 pt-6 justify-center text-lg text-gray-500 lg:pt-0 list-reset lg:flex">
            <div class="mr-3">
                <a href="#" class="inline-block px-4 py-2 no-underline hover:text-gray-900 text-gray-600">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M17.876.517A1 1 0 0 0 17 0H3a1 1 0 0 0-.871.508C1.63 1.393 0 5.385 0 6.75a3.236 3.236 0 0 0 1 2.336V19a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-6h4v6a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.044a3.242 3.242 0 0 0 1-2.294c0-1.283-1.626-5.33-2.124-6.233ZM15.5 14.7a.8.8 0 0 1-.8.8h-2.4a.8.8 0 0 1-.8-.8v-2.4a.8.8 0 0 1 .8-.8h2.4a.8.8 0 0 1 .8.8v2.4ZM16.75 8a1.252 1.252 0 0 1-1.25-1.25 1 1 0 0 0-2 0 1.25 1.25 0 0 1-2.5 0 1 1 0 0 0-2 0 1.25 1.25 0 0 1-2.5 0 1 1 0 0 0-2 0A1.252 1.252 0 0 1 3.25 8 1.266 1.266 0 0 1 2 6.75C2.306 5.1 2.841 3.501 3.591 2H16.4A19.015 19.015 0 0 1 18 6.75 1.337 1.337 0 0 1 16.75 8Z" />
                    </svg>
                </a>
            </div>

            <div class="mr-3">
                <a href="#" class="inline-block px-4 py-2 no-underline hover:text-gray-900 text-gray-600">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                    </svg>
                </a>
            </div>

            <!-- 'Hamburger' Menu -->
            <div x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block"
                :class="{ 'text-gray-900': open, 'text-gray-600': !open }">
                <!-- Dropdown Toggle Button -->
                <button @mouseover="open = true" class="flex items-center p-2 rounded-md">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
                    </svg>

                    <span :class="open = !open ? '' : '-rotate-180'"
                        class="transition-transform duration-500 transform">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </button>
                <!-- End Dropdown Toggle Button -->

                <!-- Product Menu Dropdown Menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="absolute right-0 py-1 text-gray-500 bg-white rounded-lg shadow-xl min-w-max">
                    @foreach ($categories as $category)
                        <a href="/storefront/{{ Session::get('nearestStore')->id ?? $user->store_id }}#{{ $category->title }}"
                            class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">{{ $category->title }}</a>
                    @endforeach
                </div>
                <!-- End Dropdown Menu -->
            </div>
            <!-- End Dropdown 1 -->
        </div>
    </div>

    <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
        <div class="items-center flex-1 pt-6 justify-center text-lg text-gray-500 lg:pt-0 list-reset lg:flex">
            <!-- cart icon -->
            <a class="flex items-center hover:text-gray-200 pr-6 text-grey-700" href="{{ route('cart') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="flex absolute -mt-5 ml-2">
                    @if (session('cartProducts'))
                        <span
                            class="animate-ping absolute inline-flex h-8 w-8 rounded-full bg-pink-400 opacity-75  "></span>

                        <span class="relative inline-flex rounded-full h-7 w-7 bg-pink-300 text-center"><span
                                id="totalQuantitySM"
                                class="ml-1.5  text-gray-950">{{ session()->get('quantityTotal') }}</span>
                        </span>
                    @else
                        <span id="totalQuantityMD">

                        </span>
                    @endif
                </span>
            </a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Log
                        out</a>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Sign in
                </a>
                <a href="{{ route('register') }}"
                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700">
                    Sign up
                </a>
            @endauth
        </div>
    </div>
    <!-- End show Menu lg -->
    <!-- End right nav -->

</nav>

<script>
    // Faq
    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });
        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? '-rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ?
                    `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
    //  end faq
</script>
