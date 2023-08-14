<button @mouseover="open = true" class="flex items-center p-2 rounded-md">
    <svg class="w-6 h-6 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 16 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
    </svg>

    <span :class="open = !open ? '' : '-rotate-180'" class="transition-transform duration-500 transform">
        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
    </span>
</button>
