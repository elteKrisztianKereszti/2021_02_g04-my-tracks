@extends('layouts.base')

@section('content')
<div class="row">

    @foreach ($projects as $project)
    <div class="col-sm-3 my-3">
        <div class="card h-100">
            <img src="{{ $project['bg_url'] }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $project['name'] }}</h5>
                <p class="card-text">{{ $project['description'] }}</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="{{ route('projects.show', $project['id']) }}" class="btn btn-primary">Open</a>
            </div>
        </div>
    </div>
    @endforeach


    <div class="col-sm-3 my-3">
        <div class="card h-100">
            <a href="{{ route('projects.create') }}" class="btn btn-secondary h-100 pt-5">Create a new project</a>
        </div>
    </div>

</div>
@endsection
