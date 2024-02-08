@extends('layouts.main')
@section('content')
<div>
    <form action="{{route('post.update', $post)}}" method="post">
        @csrf
        @method('patch')
        <div class="mt-3 input-group mb-3">
            <label for="title" class="form-label">Title</label>
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="Title" aria-label="title" value="{{$post->title}}">
            </div>
        </div>
        <div class="input-group">
            <label for="content" class="form-label">Content</label>
            <div class="input-group">
                <textarea class="form-control" name="content" aria-label="content">{{$post->content}}</textarea>
            </div>
        </div>
        <div class="mt-3 input-group mb-3">
            <label for="image" class="form-label">Image</label>
            <div class="input-group">
                <input type="text" name="image" class="form-control" placeholder="Image" aria-label="image" value="{{$post->image}}">
            </div>
        </div>
        <div class="mt-3 col-auto">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
