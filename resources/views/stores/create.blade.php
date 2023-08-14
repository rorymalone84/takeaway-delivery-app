<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Store') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('stores.store') }}" class="ml-7 mr-7 mt-12" enctype="multipart/form-data">
        @csrf

        @include('stores.partials.store-form');
    </form>
</x-admin-layout>
