<x-admin-layout x-data="{ open: false }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update a Product') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('products.update', $product->id) }}" class="ml-7 mr-7 mt-12"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('products.partials.product-form')
    </form>

    @if ($product->id)
        <!-- the delete button on the product edit form -->
        <div class="w-8 pl-6 py-6">
            <x-confirmation-modal name="{{ $product->title }}">
                @include('products.partials.delete-form')
            </x-confirmation-modal>
        </div>
    @endif
</x-admin-layout>
