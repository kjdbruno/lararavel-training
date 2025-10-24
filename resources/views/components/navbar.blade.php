<nav class="bg-gray-800 p-4 text-white flex justify-between items-center">
    <div class="font-bold text-xl">MyApp</div>
    <div class="space-x-4">
        @foreach ($links as $name => $url)
            <a href="{{ $url }}" class="hover:text-gray-300">{{ $name }}</a>
        @endforeach
    </div>
</nav>
