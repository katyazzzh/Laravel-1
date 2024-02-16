<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $newData = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $newData['tags'];
        unset($newData['tags']);

        $post->update($newData);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
}
