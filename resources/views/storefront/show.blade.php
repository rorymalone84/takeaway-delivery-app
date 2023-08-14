<x-storefront>
    <div class="mx-auto w-4/5">
        <h1 class="text-2xl text-gray-200 italic pt-12 mb-8">
            {{ Session::get('nearestStore')->name }} Menu
        </h1>
    </div>

    <div class="mx-auto w-4/5 mb-4 pb-8">
        @foreach ($categories as $category)
            <a id="{{ $category->title }}">
                <div class="text-2xl text-gray-100 font-bold pt-12 mb-8">{{ $category->title }}'s</div>
                <hr class="border-1 border-gray-300">
            </a>
            <div class="grid sm:grid-cols-4 gap-8 pt-20 mx-auto w-4/5">
                @foreach ($category->products as $product)
                    <div
                        class="!z-5 relative flex flex-col rounded-[20px] max-w-[300px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 w-full !p-4 3xl:p-![18px] undefined">
                        <div class="h-full w-full">
                            <div class="relative w-full">
                                <img src="{{ asset('images/' . $product->image) }}"
                                    class="mb-3 rounded-xl 3xl:h-full 3xl:w-full object-scale-down h-48 w-96 "
                                    alt="">
                                <button
                                    class="absolute top-1 right-1 flex items-center justify-center rounded-full bg-white p-2 text-brand-500 hover:cursor-pointer">
                                    <div
                                        class="flex h-full w-full items-center justify-center rounded-full text-xl hover:bg-gray-50">
                                        <a id="add" data-id="{{ $product->id }}"
                                            class="px-6 py-2 text-l uppercase text-white font-bold bg-blue-600 rounded-full w-full">
                                            +
                                        </a>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-3 flex items-center justify-between px-1 md:items-start">
                                <div class="mb-2">
                                    <a href="/storefront/showproduct/{{ $product->id }}">
                                        <p class="text-lg font-bold text-navy-700"> {{ $product->title }}</p>
                                        <p class="mt-1 text-sm font-medium text-gray-600 md:mt-2">
                                            {{ $product->description }} </p>
                                    </a>
                                </div>
                            </div>
                            <div class="text-1xl text-gray-800 font-bold">£{{ $product->price }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-storefront>
