<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Name" />
        @if ($store)
            <x-text-input class="block mt-1 w-full" type="text" name="name" :value="$store->name"
                placeholder="Enter store name" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                placeholder="Enter store name" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="address line 1" />
        @if ($store)
            <x-text-input class="block mt-1 w-full" type="text" name="address_line_1" :value="$store->address_line_1"
                placeholder="Enter store address" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="address_line_1" :value="old('address_line_1')"
                placeholder="Enter store address" />
        @endif
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="address line 2" />
        @if ($store)
            <x-text-input class="block mt-1 w-full" type="text" name="address_line_2" :value="$store->address_line_2"
                placeholder="Enter store address" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="address_line_2" :value="old('address_line_2')"
                placeholder="Enter store address" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="city" />
        @if ($store)
            <x-text-input class="block mt-1 w-full" type="text" name="city" :value="$store->city"
                placeholder="Enter city" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                placeholder="Enter city" />
        @endif
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-input-label value="post code" />
        @if ($store)
            <input name="postcode" value="{{ $store->postcode }}"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="text" placeholder="Enter post code" value="{{ $store->postcode }}" />
        @else
            <input name="postcode"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="text" placeholder="Enter post code">
        @endif
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-input-label value="phone" />
        @if ($store)
            <input name="phone" value="{{ $store->phone }}"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="number" placeholder="Enter phone #" value="{{ $store->phone }}" />
        @else
            <input name="phone"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="number" placeholder="Enter phone #">
        @endif
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-input-label value="delivery price" />
        @if ($store)
            <input name="delivery_price" value="{{ $store->delivery_price }}"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="number" placeholder="Enter delivery price" value="{{ $store->delivery_price }}" />
        @else
            <input name="delivery_price"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="number" placeholder="Enter delivery price">
        @endif
    </div>
</div>


@if ($errors)
    @foreach ($errors->all() as $error)
        <div class="bg-red-800 rounded text-center mx-20 mb-2 text-gray-100">{{ $error }}</div>
    @endforeach
@endif

<div class="flex items-center gap-4 mt-12">
    <x-primary-button class="bg-green-600 dark:bg-green-600 dark:text-slate-200">{{ __('Save') }}</x-primary-button>
</div>
