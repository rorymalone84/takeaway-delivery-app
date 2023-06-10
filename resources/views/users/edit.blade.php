<x-admin-layout x-data="{ open: false }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update a User') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('users.update', $user->id) }}" class="ml-7 mr-7 mt-12"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('users.partials.create-form')
    </form>

    @if ($user->id)
        <!-- the delete button on the product edit form -->
        <div class="w-8 pl-6 py-6">
            <x-confirmation-modal name="{{ $user->title }}">
                @include('users.partials.delete-form')
            </x-confirmation-modal>
        </div>
    @endif
</x-admin-layout>
