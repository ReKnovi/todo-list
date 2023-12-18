<html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 
    <head>
        <style>
             .blue-outline-button {
            color: #007bff; /* Blue text color */
            background-color: transparent; /* Transparent background */
            padding: 10px 20px; /* Adjust padding as needed */
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('tasks.index') }}"  class="btn blue-outline-button">AddTasks</a>
                    <a href="{{ route('tasks.viewtasks') }}"  class="btn blue-outline-button">View tasks</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>
