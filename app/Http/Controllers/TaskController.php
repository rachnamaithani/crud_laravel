<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function store(Request $request, $project_id)
    {
        $request->validate([
            'task' => 'required'
        ]);

        $task = new Task();
        $task->task_name = $request->input('task');
        $task->project_id = $project_id;
        $task->save();

        return redirect()->route('tasks.show', ['project_id' => $project_id])->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($project_id){
        $tasks = \App\Models\Task::where('project_id', $project_id)->get();
        $project = Project::find($project_id);
        $pro = \App\Models\Project::all();
        return view('create-task', compact('tasks', 'project','pro'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task_id , $project_id)
    {
        $task = \App\Models\Task::find($task_id);
        $project = \App\Models\Project::find($project_id);
        $pro = \App\Models\Project::all();
        if ($task) {
            $task->delete();
            $tasks = \App\Models\Task::where('project_id', $project_id)->get();
            return view('create-task',compact('task','tasks','project','pro'))->with('success', 'task deleted successfully');
        }

    }
}
?>
