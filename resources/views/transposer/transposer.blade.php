@extends('layouts.base')

@section('content')
    <h2>Transposer</h2>
    <form action="" method="post">
      @csrf
      <div class="form-group">
        <label for="key">Key</label>
        <select name="key" id="key" class="form-control @error('key') is-invalid @enderror" >
          <option>C</option>
          <option>C#</option>
          <option>D</option>
          <option>D#</option>
          <option>E</option>
          <option>F</option>
          <option>F#</option>
          <option>G</option>
          <option>G#</option>
          <option>A</option>
          <option>A#</option>
          <option>H</option>
        </select>
        @error('key')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="distance">Distance</label>
        <input type="text" name="distance" class="form-control @error('distance') is-invalid @enderror" id="distance" value="1">
        @error('distance')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror

      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if (isset($newKey))
    <p>New key is {{ $newKey }}.</p>
    @endif

  @endsection
