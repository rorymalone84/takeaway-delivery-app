@if ($product->id)
    <img class="h-auto max-w-lg mb-12" src="{{ asset('images/' . $product->image) }}">
@else
    <img class="h-auto max-w-lg mb-12" id="preview">
@endif

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="product" />
        @if ($product)
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$product->title"
                placeholder="Enter product name" />
        @else
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                placeholder="Enter product name" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3">
        <x-input-label value="select a category" />
        <select name="category"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @if ($product->id)
                <option value="{{ $product->category_id }}">{{ $product->category->title }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            @else
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="description" />
        @if ('product')
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$product->description"
                placeholder="Enter product description" />
        @else
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"
                placeholder="Enter product description" />
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="ingredients" />
        @if ('product')
            <x-text-input id="ingredients" class="block mt-1 w-full" type="text" name="ingredients" :value="$product->ingredients"
                placeholder="Enter ingredients" />
        @else
            <x-text-input id="ingredients" class="block mt-1 w-full" type="text" name="ingredients" :value="old('ingredients')"
                placeholder="Enter ingredients" />
        @endif
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-input-label value="upload image" />
        @if ('product')
            <input type="file" name="image"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @else
            <input type="file" name="image" value=""
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @endif
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-input-label value="price" />
        @if ('product')
            <input name="price" value="{{ $product->price }}"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="number" placeholder="Enter price" value="{{ $product->price }}" />
        @else
            <input name="price"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                type="number" placeholder="Enter price">
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
