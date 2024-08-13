<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Programmer;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory(4)->has(Blog::factory(3))->create();

        Blog::factory(30)->create();

        // category::factory(30)->create();

        // User::factory(30)->create();

        // Category::factory(10)->has(Blog::factory(5))->create();

        // foreach(range(0,9) as $i){
        // $blog=new Blog();
        // $blog->title="title".$i;
        // $blog->body="body".$i;
        // $blog->slug="slug".$i;
        // $blog->save();
        // }

        //dd('seeder is running');

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $frontend=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend','slug'=>'backend']);


        Blog::factory(10)->has(Comment::factory(3))->create(['cat_id'=>$frontend->id]);
        Blog::factory(10)->has(Comment::factory(3))->create(['cat_id'=>$backend->id]);
    }
}
