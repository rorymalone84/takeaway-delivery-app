<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <x-input-label value="product"/>
      <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="Enter product name"/>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <x-input-label value="category"/>
      <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->title}}</option>                                        
          @endforeach
      </select>
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <x-input-label value="description"/>
        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" placeholder="Enter product description"/>
      </div>
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <x-input-label value="ingredients"/>
          <x-text-input id="ingredients" class="block mt-1 w-full" type="text" name="ingredients" :value="old('ingredients')" placeholder="Enter ingredients"/>
        </div>
    </div>
  <div class="flex flex-wrap -mx-3 mb-2">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <x-input-label value="heat"/>
          <select name="heat" id="heat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Choose Spice Level</option>
            <option value="Not spicy">Not Spicy</option>
            <option value="Mild">Mild</option>
            <option value="Spicy">Some Spice</option>
            <option value="Hot">Hot</option>                  
        </select>
        <x-input-error :messages="$errors->get('heat')" class="mt-2" />
      </div>     
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <x-input-label value="cost"/>
      <input name="cost" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="£10.00">
    </div>
</div>

@if($errors)
   @foreach ($errors->all() as $error)
      <div class="bg-red-800 rounded text-center mx-20 mb-2 text-gray-100">{{ $error }}</div>
  @endforeach
@endif

<div class="flex items-center gap-4 mt-12">
  <x-primary-button class="bg-green-600">{{ __('Save') }}</x-primary-button>
</div>