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

    public function update() {
        $post = Post::find(6);
        $post->update([
            'title' => 'updated first post from php',
            'content' => 'updated first post content from php',
            'image' => 'php updated',
            'likes' => 15,
            'is_published' => 1,
        ]);
        dd('updated');
    }

    public function delete() {
        $post = Post::find(2);
        /*
         * Добавили use SoftDeletes в модель Post
         * $table->softDeletes() в миграцию и обновили migrate:fresh
         */
        $post->delete();
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
