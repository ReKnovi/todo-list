<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:start,pending,completed',
            'start_date' => 'required|date'
        ]);

        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status', 'start'), // default to 'start' if not provided
            'start_date' => $start_date,
        ]);

        return redirect('/viewtasks');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'in:start,pending,completed,postponed',
        ]);

        $updateData = [
            'status' => $request->input('status', $task->status), // default to the current status if not provided
            'start_date' => $request->input('start_date', $task->start_date),
            'postponed_date' => ($request->input('status') == 'postponed') ? $request->input('postponed_date') : null,
        ];

        $task->update($updateData);

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/viewtasks')->with('success', 'Task deleted successfully');
        
    }


    public function viewTasks()
    {
        $tasks = Task::all();
        return view('pages.viewtasks', compact('tasks'));
    }

    public function postponeTaskPage(Task $task)
    {
        return view('pages.postponetask', compact('task'));
    }

    public function postponeTask(Task $task)
    {
        request()->validate([
            'postponed_date' => 'required|date',
        ]);

        // Update postponed_date using the provided date
        $task->update([
            'start_date' => Carbon::parse(request()->input('postponed_date'))->format('Y-m-d H:i:s'),
        ]);

        return redirect('/viewtasks')->with('success', 'Task postponed successfully');
    }
}
