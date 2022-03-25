<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
      $user_id = Auth::id();
      $projects = Project::all()->where('user_id', $user_id);
      return view('projects.index', [
        'projects' => $projects,
      ]);
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects/detail', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects/create');
    }

    public function store(ProjectFormRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['user_id'] = Auth::id();
        $project = Project::create($validated_data);
        return redirect()->route('projects.show', $project->id);
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects/edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, ProjectFormRequest $request) {
        $this->authorize('update', $project);
        $validated_data = $request->validated();
        $project->update($validated_data);
        return redirect()->route('projects.show', $project->id);
    }

    public function create_task()
    {
        return view('projects/create_task');
    }

    public function destroy(Project $project) {
        $this->authorize('delete', $project);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
