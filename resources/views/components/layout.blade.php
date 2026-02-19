{{-- Pasar props a blade --}}
@props([
    'title' => 'Laracasts Tutorial'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title}}</title>
    <style>
        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }
        .card {
            background: #e3e3e3;
            padding: 1rem;
            text-align: center;
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About Us</a>
        <a href="/contact">Contact Us</a>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>

</html>