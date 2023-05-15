


<x-app-layout x-cloak x-data="{open: false}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update a Product') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('products.update',  $product->id) }}" class="ml-7 mr-7 mt-12">
        @csrf
        @method('PATCH')

        @include('products.partials.product-form')
    </form>    
</x-app-layout>