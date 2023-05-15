<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="m-2 p-2 bg-green-600 text-green-50 rounded-lg">
        <a href="{{route('products.create')}}">Add Product</a>
    </div>

    <div class="py-12">        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">                                
                            <td class="px-6 py-4">
                                {{ $product->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->category->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->cost }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('products.edit',  $product->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>                                           
                    </tr>
                    @endforeach                  
                </tbody>
            </table>
        </div>
    </div>    
</x-app-layout>