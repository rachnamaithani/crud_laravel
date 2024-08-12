<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

// Route::get('/', function () { return view('welcome'); });

/*project*/
 Route::get('create-projects',[ProjectController::class, 'create']);
 Route::post('save-projects', [ProjectController::class, 'store']);
 Route::get('/', [ProjectController::class, 'show']);
 Route::get('show-project', [ProjectController::class, 'showProject'])->name('project.show');
 Route::delete('delete-project/{project_id}', [ProjectController::class, 'deleteProject'])->name('project.delete');
 Route::get('project-by-id/{project_id}', [ProjectController::class, 'showbyid'])->name('projectbyid.show');

/*tasks*/
Route::post('create-task/{project_id}', [TaskController::class, 'store'])->name('task.create');
Route::get('show-tasks/{project_id}', [TaskController::class, 'show'])->name('tasks.show');
Route::delete('delete-task/{task_id}/{project_id}', [TaskController::class, 'destroy'])->name('task.delete');
