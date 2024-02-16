<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $newData = $request->validated();
        $tags = $newData['tags'];
        unset($newData['tags']);

        $post->update($newData);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
}
