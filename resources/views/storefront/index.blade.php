<x-storefront>
    <div class="mx-auto w-4/5 p-10">
        <div class="text-center p-8 bg-orange-100 dark:bg-slate-800 rounded">
            <h1 class="text-1xl font-bold tracking-tight text-gray-700 dark:text-gray-200 sm:text-1xl">Find your nearest
                Store</h1>
        </div>
        <form method="GET" action={{ route('get.nearest.store') }}>
            <div class="relative ">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter postcode" required>
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="bg-red-800 rounded text-center mx-20 mb-2 text-gray-100">{{ $error }}</div>
            @endforeach
        @endif
    </div>

    <div class="grid sm:grid-cols-4 gap-10 pt-20 mx-auto w-4/5">
        @foreach ($stores as $store)
            <div class="mx-auto bg-orange-100 dark:bg-slate-800 rounded">
                <h2 class="text-xl  text-gray-700 dark:text-gray-200 font-bold p-4">
                    {{ $store->name }}
                </h2>

                <p class="font-thin text-gray-700 dark:text-gray-200  p-4">
                    {{ $store->address_line_1 }}
                </p>

                <p class="text-gray-700 dark:text-gray-200 p-4 ">
                    {{ $store->postcode }}
                </p>

                @if ($store->distance)
                    <p class=" text-gray-700 dark:text-gray-200 p-4">
                        Distance: {{ round($store->distance, 2) }} miles
                    </p>
                @endif

                <p class="p-4">
                    <a href="/storefront/{{ $store->id }}"
                        class=" px-10 py-2  uppercase text-white font-bold bg-blue-600 rounded-full w-full">
                        Go to store
                    </a>
                </p>
            </div>
        @endforeach
    </div>
</x-storefront>
