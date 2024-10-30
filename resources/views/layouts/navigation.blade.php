{{-- resources/views/partials/navbar.blade.php --}}
<nav class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-indigo-600">My Laravel App</h1>
    
    @auth
        <div>
            <a href="{{ route('tasks.index') }}" class="text-indigo-600 hover:text-indigo-800 mr-4">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">Login</a>
    @endauth
</nav>
