@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}" class="mt-3 btn btn-primary">Update post</a>
    </div>
    <div>
        <form action="{{route('post.destroy', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="mt-3 btn btn-danger">Delete post</button>
        </form>
    </div>
    <div>
        <a href="{{route('post.index')}}" class="mt-3 btn btn-primary">Back to posts page</a>
    </div>
@endsection
