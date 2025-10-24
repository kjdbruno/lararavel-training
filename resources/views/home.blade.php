<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <x-navbar :links="['Home' => '/', 'About' => '/about', 'Contact' => '/contact']" />
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Welcome to My App</h1>

        @php
            $cards = [
                [
                    'title' => 'Beautiful Sunset',
                    'body' => 'This is a photo of a beautiful sunset over the mountains.',
                    'image' => 'https://images.pexels.com/photos/1144176/pexels-photo-1144176.jpeg',
                    'buttons' => [
                        ['text' => 'Like', 'color' => 'blue'],
                        ['text' => 'Share', 'color' => 'green']
                    ]
                ],
                [
                    'title' => 'Forest Path',
                    'body' => 'A serene path through a dense forest.',
                    'image' => 'https://images.pexels.com/photos/1033729/pexels-photo-1033729.jpeg',
                    'buttons' => [
                        ['text' => 'Save', 'color' => 'purple'],
                        ['text' => 'Delete', 'color' => 'red']
                    ]
                ],
                [
                    'title' => 'City Skyline',
                    'body' => 'The city skyline at night with glowing lights.',
                    'image' => 'https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg',
                    'buttons' => [
                        ['text' => 'Explore', 'color' => 'yellow']
                    ]
                ]
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
                @foreach ($cards as $item)
                    <x-card :title="$item['title']" :body="$item['body']" :image="$item['image']">
                        <x-slot name="footer">
                            @foreach ($item['buttons'] as $btn)
                                <x-button :color="$btn['color']">{{ $btn['text'] }}</x-button>
                            @endforeach
                        </x-slot>
                    </x-card>
                @endforeach
            </div>


        <x-button color="blue">Save</x-button>
        <x-button color="green">Submit</x-button>
        <x-button color="red">Delete</x-button>
        
        <x-button color="purple" class="mt-4" onclick="alert('Clicked!')">Click Me</x-button>
    </div>
</body>
</html>
