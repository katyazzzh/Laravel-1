<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::where('is_published', 1)->first();
        dd($post->title);
    }

    public function create() {
        $postsArr = [
            [
                'title' => 'first post from php',
                'content' => 'first post content from php',
                'image' => 'php',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'second post from php',
                'content' => 'second post content from php',
                'image' => 'php2',
                'likes' => 15,
                'is_published' => 1,
            ]
        ];

        foreach ($postsArr as $post) {
            dump($post['title']);
            Post::create($post);
            dump('created');
        }
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
}
