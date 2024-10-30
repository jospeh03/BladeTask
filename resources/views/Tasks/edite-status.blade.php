@extends('layouts.app')

@section('title', 'Edit Task Status')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Edit Task Status</h2>

    <form action="{{ route('tasks.updateStatus', $task) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="status" class="block mb-2">Status</label>
        <select name="status" id="status" class="w-full border-gray-300 rounded mb-4">
            <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <div class="flex justify-end">
            <a href="{{ route('tasks.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
        </div>
    </form>
</div>
@endsection
