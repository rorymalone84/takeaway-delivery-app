@props(['value'])

<label
    {{ $attributes->merge(['class' => 'block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}>
    {{ $value ?? $slot }}
</label>
