<x-storefront>
    <div class="mx-auto w-4/5 bg-orange-100 dark:bg-slate-800 rounded-lg pt-12">
        <h1 class="text-2xl text-gray-700 dark:text-gray-200 pl-6 pb-6">
            Checkout
        </h1>
        <hr class="border-1 border-gray-300">

        <h1 class="text-2xl text-gray-800 font-bold pt-2 mb-4">
            Delivering from:
            <h3>
                <div class="mb-2 uppercase">
                    {{ $user->store->name ?? Session::get('nearestStore')->name }}
                </div>
                <div class="mb-2">
                    {{ $user->store->address_line_1 ?? Session::get('nearestStore')->address_line_1 }}
                </div>
                <div class="mb-2">
                    {{ $user->store->address_line_2 ?? Session::get('nearestStore')->address_line_2 }}
                </div>
                <div class="mb-2">
                    {{ $user->store->city ?? Session::get('nearestStore')->city }}
                </div>
            </h3>
        </h1>

        <h1 class="text-2xl text-gray-800 font-bold pt-2 mb-4">
            Delivering to...
        </h1>

        <form method="POST" action="{{ route('orders.store') }}" class="ml-7 mr-7 mt-8">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="Name" />
                    @if ($user)
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="customer_name"
                            :value="$user->name" placeholder="Enter product name" />
                    @else
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="customer_name"
                            :value="old('customer_name')" placeholder="Enter your name" />
                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="address" />
                    @if ($user)
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="customer_address"
                            :value="$user->address" placeholder="Enter your address" />
                    @else
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="customer_address"
                            :value="old('customer_address')" placeholder="Enter your address" />
                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="city" />
                    @if ($user)
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_city" :value="$user->city"
                            placeholder="Enter your city" />
                    @else
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_city" :value="old('customer_city')"
                            placeholder="Enter your city" />
                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="email" />
                    @if ($user)
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_postcode"
                            :value="$user->postcode" placeholder="Enter your postcode" />
                    @else
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="customer_postcode"
                            :value="old('customer_postcode')" placeholder="Enter your postcode" />
                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="phone" />
                    @if ($user)
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_phone" :value="$user->phone"
                            placeholder="Enter your phone number" />
                    @else
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_phone" :value="old('customer_phone')"
                            placeholder="Enter your phone number" />
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="email" />
                    @if ($user)
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_email" :value="$user->email"
                            placeholder="Enter your email number" />
                    @else
                        <x-text-input class="block mt-1 w-full" type="text" name="customer_email" :value="old('customer_email')"
                            placeholder="Enter your email number" />
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input-label value="Deliver from" />
                    @if ($user)
                        <input type="hidden" name="store_id" value="{{ $user->store_id }}" />
                    @else
                        <input type="hidden" name="store_id" value="{{ Session::get('nearestStore')->id }}" />
                    @endif
                </div>
            </div>
    </div>
    <div class="mx-auto w-4/5">
        <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
            Your order
        </h1>
        <hr class="border-1 border-gray-300">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Order Cost:£
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input type="hidden" name="delivery_price"
                    value="{{ $user->store->delivery_price ?? Session::get('nearestStore')->delivery_price }}">
                Delivery Cost: £{{ $user->store->delivery_price ?? Session::get('nearestStore')->delivery_price }}
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Total Cost:
            </div>
        </div>
    </div>
    @if ($errors)
        @foreach ($errors->all() as $error)
            <div class="bg-red-800 rounded text-center mx-20 mb-2 text-gray-100">{{ $error }}</div>
        @endforeach
    @endif

    <div class="text-center p-8">
        <h1 class="text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl">All Good?</h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Proceed to...</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Complete
                Order</button>
            <a href="{{ url()->previous() }}" class="text-sm font-semibold leading-6 text-gray-900">Go Back <span
                    aria-hidden="true">→</span></a>
        </div>
        </form>
    </div>


</x-storefront>
