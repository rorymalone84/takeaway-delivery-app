<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="m-2 p-2 bg-green-600 text-green-50 rounded-lg">
        <a href="{{ route('categories.create') }}">Add Category</a>
    </div>

    <x-table.table :headers="['title', 'created by', 'action']">
        @foreach ($categories as $category)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $category->title }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $category->user->name }}
                </x-table.table-data>
                <x-table.table-data>
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </x-table.table-data>
            </tr>
        @endforeach
    </x-table.table>
</x-admin-layout>
