<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        $tags = Tag::factory(20)->create();
        $posts = Post::factory(30)->create();
        foreach ($posts as $post) {
            //5 рандомных тегов, у них берется ID, все сохраняется в коллекцию $tagsId
            $tagsId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
