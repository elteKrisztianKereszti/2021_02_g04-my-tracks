@extends('layouts.base')

@section('content')
      <h2>New track</h2>
      <form action="{{ route('projects.tracks.store', $project->id )}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Track name</label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', '') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="file">Audio file</label>
          <!-- old value cannot be use here may be the type of input (file) -->
          <input name="filename" type="file" class="form-control-file @error('filename') is-invalid @enderror" id="file" placeholder="" value="{{ old('filename', '') }}">
          @error('filename')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="color">Color</label>
          <input name="color" type="color" class="form-control @error('color') is-invalid @enderror" id="color" placeholder="" value="{{ old('color', '') }}">
          @error('color')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group d-flex flex-wrap">
            @foreach ($filters as $filter)
            <div class="custom-control custom-switch col-sm-2">
                <input
                    type="checkbox"
                    name="filters[]"
                    id="filter-{{ $filter->id }}"
                    value="{{ $filter->id }}"
                    class="custom-control-input"
                >
                <label class="custom-control-label" for="filter-{{ $filter->id }}">{{ $filter->name }}</label>
              </div>
            @endforeach
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add new track</button>
        </div>

      </form>
@endsection

