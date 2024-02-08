<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post) {
        $newData = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($newData);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'firstOrCreate post from php',
            'content' => 'firstOrCreate post content from php',
            'image' => 'php firstOrCreate',
            'likes' => 4,
            'is_published' => 1,
        ];

        $myPost = Post::firstOrCreate([
            'title' =>'firstOrCreate post from php'
        ], $anotherPost);

        dd($myPost->title);
    }

    public function updateOrCreate() {
        $updatedPost = [
            'title' => 'updateOrCreate post from php',
            'content' => 'updateOrCreate post content from php',
            'image' => 'php updateOrCreate',
            'likes' => 5,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate([
            'title' => 'updateOrCreate post from php'
        ],$updatedPost);

        dd($post->title);
    }
}
