<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/viewtasks', [TaskController::class, 'viewTasks']);

    
    Route::get('/postponetask/{task}', [TaskController::class, 'postponeTaskPage'])->name('tasks.postpone.page');
    Route::post('/tasks/{task}/postpone', [TaskController::class, 'postponeTask'])->name('tasks.postpone');

    //for dashboard
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/viewtasks', [TaskController::class, 'viewTasks'])->name('tasks.viewtasks');
});

require __DIR__ . '/auth.php';
