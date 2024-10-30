{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
    </div>

    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
    </div>

    <div class="mb-4 flex items-center">
        <input type="checkbox" name="remember" id="remember" class="text-indigo-600 border-gray-300 rounded">
        <label for="remember" class="ml-2 block text-sm text-gray-900">Remember Me</label>
    </div>

    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Login</button>
</form>
@endsection

@section('footer')
<p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection
