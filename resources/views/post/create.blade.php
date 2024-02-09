@extends('layouts.main')
@section('content')
<div>
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mt-3 input-group mb-3">
            <label for="title" class="form-label">Title</label>
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="Title" aria-label="title">
            </div>
        </div>
        <div class="input-group">
            <label for="content" class="form-label">Content</label>
            <div class="input-group">
                <textarea class="form-control" name="content" aria-label="content"></textarea>
            </div>
        </div>
        <div class="mt-3 input-group mb-3">
            <label for="image" class="form-label">Image</label>
            <div class="input-group">
                <input type="text" name="image" class="form-control" placeholder="Image" aria-label="image">
            </div>
        </div>
        <label for="category" class="form-label">Category</label>
        <div class="input-group mb-3">
            <select class="form-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 col-auto">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection
