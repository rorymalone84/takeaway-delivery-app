@props([
    'name' => "name"
])

<div x-data="{ open: false }" x-cloak>
    <div x-ref="modal1_button"
            @click="open = true"
            class="inline-flex items-center px-4 py-2 bg-red-600  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 dark:bg-red-600 dark:text-slate-200">
            Delete
    </div>

    <div role="dialog"
         aria-labelledby="modal1_label"
         aria-modal="true"
         tabindex="0"
         x-show="open"
         @click="open = false; $refs.modal1_button.focus()"
         @click.away="open = false; $refs.modal1_button.focus()"
         class="fixed top-0 left-0 w-full h-screen flex justify-center items-center">
        <div class="absolute top-0 left-0 w-full h-screen bg-black opacity-60"
             aria-hidden="true"
             x-show="open"></div>
        <div @click.stop=""
             x-show="open"
             class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white z-10">             
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete Product</h3>
                    <div class="mt-2">
                      <p class="text-sm text-gray-500">Are you sure you want to delete {{$name}}?</p>
                    </div>
                  </div>
                </div>
              </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                {{$slot}}
                <div type="button" @click="open = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</div>
            </div>
        </div>
    </div>
</div>