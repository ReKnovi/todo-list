<html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Task list') }}
        </h2>
    </x-slot>
    <head>
        <style>
             .blue-outline-button {
            color: #007bff; /* Blue text color */
            background-color: transparent; /* Transparent background */
            padding: 10px 10px; /* Adjust padding as needed */
            border: 2px solid #007bff; /* Blue border */
            border-radius: 5px; /* Add border radius for rounded corners */
            text-decoration: none; /* Remove default link underline */
            display: inline-block;
            cursor: pointer;
        }

        /* Hover effect for the button */
        .blue-outline-button:hover {
            background-color: rgba(0, 123, 255, 0.1); /* Light blue on hover */
        }

        </style>
    </head>  
    @foreach ($tasks as $task)
        <div class="text-xl text-white leading-tight">
            {{ $task->title }}
            <br>
            Status: {{ $task->status }}
            <br>
            Start Date: {{ $task->start_date }}
            <br>
            <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" style="display: inline;">
                @method('DELETE')
                @csrf
                <button type="submit"  class="btn blue-outline-button">Delete</button>
            </form>
            <a href="/postponetask/{{$task->id}}">
                <button  class="btn blue-outline-button">Postpone</button>
            </a>
        </div>
        <hr>
    @endforeach
</x-app-layout>
</html>
