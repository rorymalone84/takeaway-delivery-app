    <x-storefront>
        <div class="mx-auto w-4/5">
            <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
                Choose your nearest store
            </h1>
        
            <hr class="border-1 border-gray-300">
        </div>
        
        <div class="grid sm:grid-cols-4 gap-8 pt-20 mx-auto w-4/5">
            @foreach ($stores as $store)
            <div class="mx-auto">        
                <h2 class="text-xl text-gray-600 font-bold pb-8">
                    {{ $store->name }}
                </h2>
                
                <p class="font-thin text-xs text-black pb-8">
                    {{ $store->address }}
                </p>
        
                <p class="font-bold text-l text-black pb-8">
                   {{ $store->postcode}}
                </p>
        
                <a  href="/store_front/{{ $store->id }}"
                    class="px-6 py-2 text-l uppercase text-white font-bold bg-blue-600 rounded-full w-full">
                    Go to store
                </a>
            </div>
            @endforeach
        </div>
    </x-storefront>