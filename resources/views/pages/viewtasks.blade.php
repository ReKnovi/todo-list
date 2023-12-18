<html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>
    <head>
        <style>
            /* Custom styling for the View Tasks page */
            .task-row {
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 40px; /* Add margin to the left of the row */
                margin-right: 40px; /* Add margin to the right of the row */
            }

            .notebook-entry {
                width: 49.5%; /* Adjust the width based on your preference */
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease-in-out;
            }

            .notebook-entry:hover {
                transform: scale(1.02);
            }

            /* Fancy notebook title styling */
            .notebook-title {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
                text-decoration: underline;
            }

            /* Notebook entry styling for status and start date */
            .notebook-entry-text {
                font-size: 18px;
                color: #555;
                margin-bottom: 5px;
            }

            /* Blue outline button styling */
            .blue-outline-button {
                color: #007bff;
                background-color: transparent;
                padding: 10px 15px;
                border: 2px solid #007bff;
                border-radius: 5px;
                text-decoration: none;
                cursor: pointer;
                transition: background-color 0.3s ease-in-out;
            }

            /* Hover effect for the button */
            .blue-outline-button:hover {
                background-color: rgba(0, 123, 255, 0.1);
            }
        </style>
    </head>
    @foreach ($tasks->chunk(2) as $taskChunk)
        <div class="task-row">
            @foreach ($taskChunk as $task)
                <div class="notebook-entry">
                    <div class="notebook-title">
                        {{ $task->title }}
                    </div>
                    <div class="notebook-entry-text">
                        Status: {{ $task->status }}
                    </div>
                    <div class="notebook-entry-text">
                        Start Date: {{ $task->start_date }}
                    </div>
                    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" style="display: inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn blue-outline-button">Delete</button>
                    </form>
                    <a href="/postponetask/{{$task->id}}">
                        <button class="btn blue-outline-button">Postpone</button>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</x-app-layout>
</html>
