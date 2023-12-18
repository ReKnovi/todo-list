<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postpone task') }}
        </h2>
    </x-slot>
    <form action="{{ url('/tasks/' . $task->id . '/postpone') }}" method="POST">
        @csrf
        <label for="postponed_date">New Postponed Date:</label>
        <input type="datetime-local" name="postponed_date" required>
        <br>
        <form action="{{ route('tasks.postpone', ['task' => $task->id]) }}" method="POST">
            @csrf
            <!-- Other form elements -->
            <button type="submit">Update Postponed Date</button>
        </form>
</x-app-layout>
