<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this ->getCategoryId($category);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post;
    }

    public function update($post, $newData)
    {
        $tags = $newData['tags'];
        unset($newData['tags']);
        $post->update($newData);
        $post->tags()->sync($tags);
        return $post->fresh();
    }
    private function getCategoryId($category)
    {
        $newCategory = !isset($category['id']) ? Category::create($category) : Category::find($category['id']);
        return $newCategory->id;
    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
}
