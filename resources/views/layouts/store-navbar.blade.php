<nav x-data="accordion(6)" x-cloak
    class="fixed top-0 z-40 flex flex-wrap items-center justify-between w-full px-4 py-5 tracking-wide  shadow-md bg-slate-900 bg-opacity-90 md:py-8 md:px-8 lg:px-14">
    <!-- Left nav -->
    <div class="flex items-center">
        <a href="#" class="font-serif text-slate-300 text-2xl md:text-3xl tracking-wide">
            Takeaway App
        </a>
    </div>
    <!-- End left nav -->

    <!-- Centre Nav product menu links -->
    <div x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block"
        :class="{ 'text-slate-300 ': open, 'text-slate-300 ': !open }">
        <!-- Menu Dropdown Toggle Button -->
        @include('storefront.nav-partials.menu-dropdown-button')

        <!-- Product Menu Dropdown Menu -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="absolute right-0 py-1 text-gray-900 bg-white rounded-lg shadow-xl min-w-max">
            @if ($categories)
                @foreach ($categories as $category)
                    <a href="/storefront/{{ Session::get('nearestStore')->id ?? null }}#{{ $category->title }}"
                        class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">{{ $category->title }}</a>
                @endforeach
            @else
                <div class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">No menu categories yet</div>
            @endif
        </div>
    </div>

    <!--small screen cart-->
    @include('storefront.nav-partials.small-device-cart')

    <!-- Toggle button -->
    @include('storefront.nav-partials.toggle-button')

    <!-- Small device toggle menu -->
    <div x-ref="tab" :style="handleToggle()"
        class="relative w-full overflow-hidden transition-all duration-700 lg:hidden max-h-0">
        <div class="flex flex-col my-3 space-y-2 text-lg hover:font-b text-gray-600">
            @auth
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ url('/admin/dashboard') }}" class="hover:text-gray-900"><span>Admin Dashboard</span></a>
                    <hr>
                @endif
                @if (Auth::user()->hasRole('customer'))
                    <a href="{{ url('/customer/dashboard') }}" class="hover:text-gray-900"><span>Previous
                            Orders</span></a>
                    <hr>
                @endif
                <a href="{{ route('profile.edit') }}" class="hover:text-gray-900"><span>My Profile</span></a>
                <hr>
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

    <!-- Md and upwards right nav-->
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
        <div class="items-center flex-1 pt-6 justify-center text-lg text-gray-500 lg:pt-0 list-reset lg:flex">

            <a href="{{ route('profile.edit') }}" class="pr-6 pb-2">
                <svg class="w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 19">
                    <path
                        d="M7.324 9.917A2.479 2.479 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0-.707 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z" />
                </svg>
            </a>

            <!-- Medium device cart -->
            @include('storefront.nav-partials.medium-device-cart')

            <!--Authentication buttons on Medium devices and upwards -->
            @include('storefront.nav-partials.auth-buttons')
        </div>
    </div>
    <!-- End right nav -->
</nav>

<script src="{{ asset('/js/alpineAccordion.js') }}"></script>
