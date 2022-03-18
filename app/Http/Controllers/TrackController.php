<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Filter;
use App\Models\Project;

class TrackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $filters = Filter::all();
        return view('tracks.create', [
            'project' => $project,
            'filters' => $filters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackRequest $request, Project $project)
    {
        $validated_data = $request->validated();
        $track = $project->tracks()->create($validated_data);
        $track->filters()->sync($validated_data['filters'] ?? []);
        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        $filters = Filter::all();
        return view('tracks.edit', [
            'track' => $track,
            'filters' => $filters
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackRequest  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackRequest $request, Track $track)
    {
        $validated_data = $request->validated();
        $track->update($validated_data);
        $track->filters()->sync($validated_data['filters'] ?? []);
        return redirect()->route('projects.show', $track->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('projects.show', $track->project_id);
    }
}
