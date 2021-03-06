<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        $categories = Category::factory(25)->create();
        $tags = Tag::factory(100)->create();
        $post = Post::factory(1000)->make(['category_id' => null, 'user_id' => null])->each(function ($post) use ($users, $categories) {
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->save();

        });


        $post->each(function ($post) use ($tags){
            $post->tags()->attach($tags->random(rand(5, 10))->pluck('id'));
        });

    }
}
