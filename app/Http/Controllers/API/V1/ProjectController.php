<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'project_title' => 'required',
            'project_description' => 'required|string|max:1000',
            'project_date' => 'required|date'
        ]);

        $project = Project::create($validateData);
        return response()->json(['message' =>'Project created successfully'],200);
    }
}
