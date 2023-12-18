<html>
    <head>
        <style>
            /* Custom styling for the Add Tasks page */
            form {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
    
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
    
            input[type="text"],
            textarea,
            select,
            input[type="datetime-local"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
    
            /* Dynamic button styling based on status */
            button {
                color: #007bff; /* Blue text color */
            background-color: transparent; /* Transparent background */
            padding:10px 15px; /* Adjust padding as needed */
            border: 2px solid #007bff; /* Blue border */
            border-radius: 4px; /* Add border radius for rounded corners */
            text-decoration-style:wavy;
            display: inline-block;
            cursor: pointer;
            }
    
            /* Dynamic button colors based on status
            .status-start {
                background-color: #4caf50;
                color: #f90b0b;
            }
    
            .status-pending {
                background-color: #ffc107;
                color: #5200f7;
            }
    
            .status-completed {
                background-color: #007bff;
                color: #fff;
            } */
    
            /* Hover effect for all buttons */
            button:hover {
                opacity: 0.5;
            }
        </style>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add Tasks') }}
                </h2>
            </x-slot>
        
            <form action="{{ url('/tasks') }}" method="POST">
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" required>
        
                <label for="description">Description:</label>
                <textarea name="description"></textarea>
        
                <label for="status">Status:</label>
                <select name="status">
                    <option value="start">Start</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
        
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" name="start_date">
        
                @php
                    // Get the task status from the form (assuming it's stored in a variable $status)
                    $status = isset($status) ? $status : 'start';
                @endphp
        
                {{-- Dynamic button class based on status --}}
                <button type="submit" class="status-{{ $status }}">Add Task</button>
            </form>
        </x-app-layout>
        
    </body>
</html>