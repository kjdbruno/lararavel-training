<div {{ $attributes->merge(['class' => 'bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300']) }}>

    <!-- Image -->
    @isset($photo)
        <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name ?? 'Card Image' }}" class="w-full h-48 object-cover">
    @endisset

    <div class="p-6">
        <!-- Title Slot -->
        <div class="font-bold text-xl mb-2">
            {{ $name }}
        </div>

        @isset($footer)
            <div class="mt-4 flex space-x-2">
                <x-button color="green" onclick="window.location='{{ route('category.edit', $item->id) }}'">
                    Edit
                </x-button>
                <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-button color="red" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</x-button>
                </form>
            </div>
        @endisset
    </div>
</div>
