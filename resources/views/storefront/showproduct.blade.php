<x-storefront>
    <div class="grid sm:grid-cols-2 gap-2 pt-12 sm:pt-20 mx-auto w-4/5 pb-8">
        <div class="mx-auto">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">
        </div>

        <div>
            <h1 class="text-4xl text-gray-600 font-bold pb-8">
                {{ $product->title }}
            </h1>

            <p class="font-bold text-l text-black pb-8">
                Price: <span class="text-red-500">£ {{ $product->price }}</span>
            </p>

            <h1 class="text-1xl underline text-gray-600 font-bold pb-4">
                Ingredients
            </h1>


            <p class="font-thin text-s text-black pb-8">
                {{ $product->ingredients }}
            </p>

            <h1 class="text-1xl underline text-gray-600 font-bold pb-4">
                Description
            </h1>

            <p class="text-gray-800 text-thin text-l leading-6 pb-12">
                {{ $product->description }}
            </p>

            <a href="{{ route('add.to.cart', ['product', $product->id]) }}"
                class="px-6 py-4 uppercase text-white font-bold bg-blue-600 rounded-full w-full" role="button"
                aria-pressed="true">
                Add To Cart
            </a>
        </div>
    </div>
</x-storefront>
