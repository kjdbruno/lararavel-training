<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Category') }}
            <x-button color="green" onclick="window.location='{{ route('category.create') }}'">
                Create
            </x-button>
        </h2>
    </x-slot>

    <div class="p-12">
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            @foreach ($categories as $item)
                <x-card :name="$item['name']" :photo="$item['photo']" :item="$item">
                    <x-slot name="footer">
                    </x-slot>
                </x-card>
            @endforeach
        </div>
    </div>
</x-app-layout>