<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold mb-4">Your Tasks</h1>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Due Date</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td class="py-2 px-4 border-b">{{ $task->title }}</td>
                <td class="py-2 px-4 border-b">{{ $task->description }}</td>
                <td class="py-2 px-4 border-b">{{ $task->due_date }}</td>
                <td class="py-2 px-4 border-b flex space-x-3">
                    <!-- Status Toggle Icon -->
                    <form action="{{ route('tasks.toggleStatus', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-gray-500">
                            @if($task->status === 'Pending')
                                <i class="far fa-circle text-gray-500" title="Mark as Completed"></i>
                            @else
                                <i class="fas fa-check-circle text-green-500" title="Mark as Pending"></i>
                            @endif
                        </button>
                    </form>

                    <!-- Edit Icon -->
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">
                        <i class="fas fa-edit" title="Edit Task"></i>
                    </a>

                    <!-- Delete Icon -->
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" title="Delete Task">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
@endsection
