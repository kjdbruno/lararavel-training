<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <style>
        
    </style>
</head>
<body style="padding: 50px;">
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">title:</label><br>
        <input type="text" id="title" name="title" value="{{ $book->title }}"><br>
        <label for="description">description:</label><br>
        <input type="text" id="description" name="description" value="{{ $book->description }}"><br>
        <label for="stocks">stocks:</label><br>
        <input type="text" id="stocks" name="stocks" value="{{ $book->stocks }}"><br>
        <label for="amount">amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ $book->amount }}"><br>
        <input type="submit">
    </form>
</body>
</html>