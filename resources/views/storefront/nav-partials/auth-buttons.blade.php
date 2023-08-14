@auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700"
            href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Log
            out</a>
    </form>
@else
    <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
        Sign in
    </a>
    <a href="{{ route('register') }}"
        class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700">
        Sign up
    </a>
@endauth
