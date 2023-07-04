<x-admin-layout>
    <x-slot name="header">
        <div class="grid grid-rows-1 grid-flow-col justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
            <form action="{{ route('users.index') }}" method="GET" role="search">
                @csrf
                <x-text-input name="search" placeholder=" Search User" />
                <a href="/admin/users" class="dark:text-gray-50">clear</a>
            </form>
        </div>
    </x-slot>

    <x-table.table :headers="['name', 'email', 'address', 'action']">
        @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $user->name }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $user->email }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $user->address }}
                </x-table.table-data>
                <x-table.table-data>
                    <a href="{{ route('users.edit', $user->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </x-table.table-data>
            </tr>
        @endforeach
    </x-table.table>
    {{ $users->onEachSide(5)->links() }}
</x-admin-layout>
