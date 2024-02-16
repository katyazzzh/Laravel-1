<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $newData = $request->validated();
        $this->service->update($post, $newData);
        return redirect()->route('post.show', $post->id);
    }
}
