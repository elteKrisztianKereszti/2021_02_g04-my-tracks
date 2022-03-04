<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
      $projects = Project::all();
      return view('projects.index', [
        'projects' => $projects,
      ]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects/detail', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects/create');
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable|url',
        ]);
        $project = Project::create($validated_data);

        return redirect()->route('projects.show', $project->id);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects/edit', [
            'project' => $project
        ]);
    }


    public function update($id, Request $request) {
        $project = Project::findOrFail($id);
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable|url',
        ]);

        $project->update($validated_data);
        return redirect()->route('projects.show', $project->id);
    }

    public function create_task()
    {
        return view('projects/create_task');
    }

    public function delete($id) {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.list');
    }
}
