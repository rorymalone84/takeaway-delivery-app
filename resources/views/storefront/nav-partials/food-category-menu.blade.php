<div x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block"
    :class="{ 'text-slate-900 dark:text-slate-300 ': open, 'text-slate-900 dark:text-slate-300 ': !open }">
    <!-- Menu Dropdown Toggle Button -->
    @include('storefront.nav-partials.menu-dropdown-button')

    <!-- Product Menu Dropdown Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="absolute right-0 py-1 text-gray-900 dark:text-gray-300 bg-orange-100 dark:bg-slate-800 rounded-lg shadow-xl min-w-max">
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
