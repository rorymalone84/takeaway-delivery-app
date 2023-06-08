<x-storefront>
    <div class="mx-auto w-4/5">
        <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
            Order Complete
        </h1>
        <hr class="border-1 border-gray-300">
        <div class="flex flex-wrap -mx-3 mb-6">
            
        </div>
    </div>
    <div class="mx-auto w-4/5">
        <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
            Your order
        </h1>
        <hr class="border-1 border-gray-300">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Order Cost: 
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Delivery Cost: 
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                Total Cost: 
            </div>
        </div>
    </div>

    <div class="text-center p-8">
        <h1 class="text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl">All Good?</h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Proceed to...</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Complete Order</a>
        <a href="{{url()->previous()}}" class="text-sm font-semibold leading-6 text-gray-900">Go Back <span aria-hidden="true">→</span></a>
        </div>
    </div>
</x-storefront>