<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f3f4f6;
        }
        .container {
            text-align: center;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .auth-links a {
            display: block;
            margin: 1rem 0;
            font-size: 1.1rem;
            color: #4f46e5;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: 1px solid #4f46e5;
            border-radius: 5px;
            transition: background-color 0.2s, color 0.2s;
        }
        .auth-links a:hover {
            background-color: #4f46e5;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <div class="auth-links">
            <a href="{{ route('login') }}">Login</a> <!-- Link to login view -->
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
