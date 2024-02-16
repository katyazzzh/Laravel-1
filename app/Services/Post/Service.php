<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }
    public function update($post, $newData)
    {
        $tags = $newData['tags'];
        unset($newData['tags']);
        $post->update($newData);
        $post->tags()->sync($tags);
    }
}
