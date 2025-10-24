<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<body style="padding: 50px;">
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <x-alert style="background: red; color: white; padding: 15px;" text="message here 1"></x-alert>
    <x-alert style="background: green; color: white; padding: 15px;" text="message here 2"></x-alert>
    <x-alert style="background: blue; color: white; padding: 15px;" text="message here 3"></x-alert>

    <a class="button button1" href="{{ url('/books/create') }}">Add</a>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($books as $item)
            <x-card-list :item="$item"></x-card-list>
        @endforeach
    </div>

    <x-button style="background: red;" text="error" />
    <x-button style="background: blue;" text="cancel" />
    <x-button style="background: green;" text="save" />
    
</body>
</html>