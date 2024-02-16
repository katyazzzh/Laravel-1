@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mt-3 input-group mb-3">
                <label for="title" class="form-label">Title</label>
                <div class="input-group">
                    <input value="{{old('title')}}"
                           type="text" name="title" class="form-control" placeholder="Title" aria-label="title">
                </div>
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="input-group">
                <label for="content" class="form-label">Content</label>
                <div class="input-group">
                    <textarea class="form-control" name="content" aria-label="content">{{old('content')}}</textarea>
                </div>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mt-3 input-group mb-3">
                <label for="image" class="form-label">Image</label>
                <div class="input-group">
                    <input value="{{old('image')}}"
                           type="text" name="image" class="form-control" placeholder="Image" aria-label="image">
                </div>
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <label for="category" class="form-label">Category</label>
            <div class="input-group mb-3">
                <select class="form-select" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                           {{!empty(old('tags')) && (in_array($tag->id, old('tags'))) ? 'checked' : ''}}
                           value="{{$tag->id}}" id="tag" name="tags[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$tag->tag_name}}
                    </label>
                </div>
            @endforeach
            <div class="mt-3 col-auto">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
