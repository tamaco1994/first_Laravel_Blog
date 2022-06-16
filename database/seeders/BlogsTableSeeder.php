<?php

namespace Database\Seeders;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Blog::class, 15)->create();
        // Blog::factory()->count(15)->create();
        \App\Models\Blog::factory()->count(15)->create();
    }
}