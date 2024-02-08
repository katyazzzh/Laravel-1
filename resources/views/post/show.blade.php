@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}" class="mt-3 btn btn-link">Update post</a>
    </div>
    <div>
        <a href="{{route('post.index')}}" class="mt-3 btn btn-link">Back to posts page</a>
    </div>
@endsection
