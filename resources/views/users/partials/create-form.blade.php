<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Name" />
        @if ($user)
            <x-text-input class="block mt-1 w-full" type="text" name="name" :value="$user->name"
                placeholder="Enter user name" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                placeholder="Enter user name" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Email" />
        @if ($user)
            <x-text-input class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                placeholder="Enter user email" />
        @else
            <x-text-input class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                placeholder="Enter user email" />
        @endif
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Address" />
        @if ($user)
            <x-text-input class="block mt-1 w-full" type="text" name="address" :value="$user->address"
                placeholder="Enter user address" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                placeholder="Enter user address" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6">
        <x-input-label value="city" />
        @if ($user)
            <x-text-input class="block mt-1 w-full" type="text" name="city" :value="$user->city"
                placeholder="Enter your city" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                placeholder="Enter your city" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Postcode" />
        @if ($user)
            <x-text-input class="block mt-1 w-full" type="text" name="postcode" :value="$user->postcode"
                placeholder="Enter user postcode" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')"
                placeholder="Enter user postcode" />
        @endif
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="phone" />
        @if ($user)
            <x-text-input class="block mt-1 w-full" type="text" name="phone" :value="$user->phone"
                placeholder="Enter phone number" />
        @else
            <x-text-input class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                placeholder="Enter phone number" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Nearest Store" />
        <select name="store_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @if ($user)
                <option name="store_id" value="{{ $user->store_id }}">{{ $user->store->name ?? null }}</option>
                @foreach ($stores as $store)
                    <option name="store_id" value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            @else
                @foreach ($stores as $store)
                    <option name="store_id" value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            @endif
        </select>
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
