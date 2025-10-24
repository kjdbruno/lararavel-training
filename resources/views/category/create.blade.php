<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Category') }}
        </h2>
    </x-slot>

    <div class="p-10">
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="photo">photo:</label><br>
            <input type="file" id="photo" name="photo" accept="image/*"><br>
            <input type="submit">
        </form>
    </div>
</x-app-layout>