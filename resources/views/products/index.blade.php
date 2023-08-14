<x-admin-layout>
    <x-slot name="header">
        <div class="grid grid-rows-1 grid-flow-col justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products') }}
            </h2>
            <form action="{{ route('products.index') }}" method="GET" role="search">
                @csrf
                <x-text-input name="search" placeholder=" Search Product" />
                <a href="/admin/products" class="dark:text-gray-50">clear</a>
            </form>
        </div>
    </x-slot>

    <div class="m-2 p-2 bg-green-600 text-green-50 rounded-lg">
        <a href="{{ route('products.create') }}">Add Product</a>
    </div>

    <x-table.table :headers="['title', 'description', 'category', 'cost', 'action']">
        @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-table.table-data>
                    {{ $product->title }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $product->description }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $product->category->title }}
                </x-table.table-data>
                <x-table.table-data>
                    {{ $product->price }}
                </x-table.table-data>
                <x-table.table-data>
                    <a href="{{ route('products.edit', $product->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </x-table.table-data>
            </tr>
        @endforeach
    </x-table.table>
    {{ $products->onEachSide(5)->links() }}
</x-admin-layout>
