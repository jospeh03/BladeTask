<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Cache;
use Illuminate\Http\Request;
use App\Events\TaskStatusToggled;

class TaskController extends Controller
{
    // Display a list of tasks
    public function index()
    {
        // Check if tasks are cached; if not, query and cache them for 10 minutes
        $tasks = Cache::remember('tasks', 600, function () {
            return Task::all();
        });

        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task in the database
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();

        // Set the status to "Pending" by default
        $validatedData['status'] = 'Pending';

        Task::create($validatedData);
        Cache::forget('tasks');


        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
    // Show the form for editing a task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update a task in the database
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $ValidateData=$request->validated();

        $task->update($ValidateData);
        Cache::forget('tasks');


        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Delete a task from the database
    public function destroy(Task $task)
    {
        $task->delete();
        Cache::forget('tasks');

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
    // In TaskController.php
        public function editStatus(Task $task)
    {
        return view('tasks.edit-status', compact('task'));
    }
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Completed',
        ]);

        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }


    public function toggleStatus(Task $task)
    {
        $task->status ='Completed';
        $task->save();

        // Dispatch the event
        event(new TaskStatusToggled($task));

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }
}
