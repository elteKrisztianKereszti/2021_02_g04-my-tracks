@extends('layouts.base')

@section('content')
<h2>New project</h2>
<form method="post">

@csrf

<div class="form-group">
    <label for="name">Project name</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="">
    <div class="invalid-feedback">
    Please choose a username.
    </div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
    <div class="invalid-feedback">
    Please choose a username.
    </div>
</div>

<div class="form-group">
    <label for="image_url">Background image URL</label>
    <input name="image_url" type="text" class="form-control" id="image_url" placeholder="">
    <div class="invalid-feedback">
    Please choose a username.
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Add new project</button>
</div>

</form>
@endsection
