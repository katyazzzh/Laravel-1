@extends('layouts.main')
@section('content')
<div>
    <div class="input-group mb-3">
        <label for="basic-url" class="form-label">Title</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Title" aria-label="Title">
        </div>
    </div>
    <div class="input-group mb-3">
        <label for="basic-url" class="form-label">Description</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Description" aria-label="Description">
        </div>
    </div>
    <div class="input-group">
        <label for="basic-url" class="form-label">Content</label>
        <div class="input-group">
            <textarea class="form-control" aria-label="Content"></textarea>
        </div>
    </div>
</div>
@endsection
