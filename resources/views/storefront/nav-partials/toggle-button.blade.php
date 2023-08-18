<div @click="handleClick()" x-data="{ open: false }"
    class="text-gray-700 dark:text-gray-300 cursor-pointer lg:hidden flex flex-row">
    <button @click="open = ! open" class="w-6 h-6 text-lg">
        <svg x-show="! open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
            :clas="{ 'transition-full each-in-out transform duration-500': !open }">
            <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
            <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"></path>
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
</div>
