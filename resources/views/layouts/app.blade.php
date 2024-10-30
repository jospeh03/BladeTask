<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Add this in the head of app.blade.php -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-indigo-600 p-4 shadow-md text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('tasks.index') }}" class="text-xl font-semibold">Task Manager</a>
            <div class="flex space-x-4">
                <a href="{{ route('tasks.index') }}" class="hover:underline">Home</a>
                <a href="{{ route('tasks.create') }}" class="hover:underline">Create Task</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto mt-8">
        @yield('content')
    </main>

</body>
</html>
