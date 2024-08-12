<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;


class ProjectController extends Controller
{
    public function create()
    {
        $pro = \App\Models\Project::all();
        return view('create-project',compact('pro'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'project_title' => 'required',
            'project_description' => 'required|string|max:1000',
            'project_date' => 'required|date'
        ]);

        $project = \App\Models\Project::create([
            'project_title' => $request->input('project_title'),
            'project_description' => $request->input('project_description'),
            'project_date' => $request->input('project_date'),
        ]); 
        return redirect()->route('project.show',['project_id'=>$project->project_id])->with('success', 'Project created successfully.');
    }

    public function show(){

        $pro = \App\Models\Project::all();
        return view('welcome',compact('pro'));

    }

    public function showProject(Request $request)
    {
        $pro = \App\Models\Project::all();
        $project_id = $request->query('project_id');

        $project = Project::find($project_id);
        return view('create-task',compact('project','pro'));
    }


    public function deleteProject($project_id)
    {
        $project = \App\Models\Project::find($project_id);
        if ($project) {
            $project->delete();
            return redirect()->route('project.show')->with('success', 'Project deleted successfully');
        }
    }

    public function showbyid($project_id)
    {
        $project = \App\Models\Project::find($project_id);
        $tasks = \App\Models\Task::where('project_id', $project_id)->get();
        $pro = \App\Models\Project::all();
        return view('create-task',compact('tasks','project','pro'));
    }
}
