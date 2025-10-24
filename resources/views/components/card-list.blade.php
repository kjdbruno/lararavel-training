<div class="bg-white shadow-lg rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-gray-800">{{ $item->title }}</h3>
        <span class="text-gray-500 text-sm">ID: {{ $item->id }}</span>
    </div>
    <p class="text-gray-600 mb-1"><strong>Description:</strong> {{ $item->description }}</p>
    <p class="text-gray-600 mb-1"><strong>Stocks:</strong> {{ $item->stocks }}</p>
    <div class="flex justify-between">
        <a href="{{ route('books.edit', $item->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">Edit</a>
        <form action="{{ route('books.destroy', $item->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg transition" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
        </form>
    </div>
</div>