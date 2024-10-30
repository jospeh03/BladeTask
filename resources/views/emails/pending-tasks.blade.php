<!-- resources/views/emails/pending-tasks.blade.php -->
<h1>Pending Tasks for Today</h1>

<ul>
    @foreach($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong> - Due on {{ $task->due_date->format('Y-m-d') }}
        </li>
    @endforeach
</ul>

<p>Don't forget to complete your tasks!</p>
