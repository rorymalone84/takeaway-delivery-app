<x-admin-layout x-data="{ open: false }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Category') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('categories.update', $category->id) }}" class="ml-7 mr-7 mt-12">
        @csrf
        @method('PATCH')

        @include('categories.partials.category-form')
    </form>

    @if ($category->id)
        <!-- the delete button on the product edit form -->
        <div class="w-8 pl-6 py-6">
            <x-confirmation-modal name="{{ $category->title }}">
                @include('categories.partials.delete-form')
            </x-confirmation-modal>
        </div>

        <div class="rounded text-red-600 p-2 ">Warning: deleting this category will also delete all the products within
            this category</div>
        <div class="rounded text-slate-600 p-2 dark:text-white">If you wish to keep the products under this category,
            update their category before proceeding with deletion</div>
    @endif
</x-admin-layout>
