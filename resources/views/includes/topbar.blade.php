<header class="bg-white shadow flex items-center justify-between px-6 py-6 relative z-10" x-data="{ open: false }">
    <h1 class="text-xl font-semibold text-gray-800">Hospital Management System</h1>

    <div class="relative" @click.outside="open = false">
        <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
            <span class="text-gray-600 font-medium">{{ Auth::user()->name }}</span>
            <img src="https://ui-avatars.com/api/?name=Admin" alt="Admin" class="w-8 h-8 rounded-full border border-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        {{-- Dropdown Menu --}}
        <div x-show="open" x-transition
             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 py-2"
             style="display: none;">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Profile</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
            <hr class="my-1 border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
            </form>
        </div>
    </div>
</header>

{{-- Include Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
