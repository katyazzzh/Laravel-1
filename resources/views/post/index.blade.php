@extends('layouts.main')
@section('content')
    <div>
        @foreach($posts as $post)
        <div class="mt-3"><a href="{{route('post.show', $post->id)}}"> {{$post->id}}. {{$post->title}} </a>
            </div>
        @endforeach

        <div class="mt-3">
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
    <div>
        <a href="{{route('post.create')}}" class="mt-3 btn btn-primary">Create post</a>
    </div>
@endsection
