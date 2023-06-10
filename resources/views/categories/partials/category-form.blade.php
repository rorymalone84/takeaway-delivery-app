<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="Category name" />
        @if ($category)
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$category->title"
                placeholder="Enter category name" />
        @else
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                placeholder="Enter category name" />
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
