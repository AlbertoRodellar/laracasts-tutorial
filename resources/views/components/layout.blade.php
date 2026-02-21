{{-- Pasar props a blade --}}
@props([
    'title' => 'Laracasts Tutorial',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

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
        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #fff;
        }
        nav a {
            color: #fff;
            margin-right: 1rem;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-gray-700 p-6 max-w-xl mx-auto">
    <nav>
        <a href="/">Home</a>
        <a href="/about">About Us</a>
        <a href="/contact">Contact Us</a>
        <a href="/tasks">Tasks</a>
        <a href="/ideas">Ideas</a>
        <a href="/ideas-database">Ideas Database</a>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
