<?php

namespace Database\Factories;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    // BlogモデルとFactoryを結びつける。
    protected $model = \App\Models\Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'content' => $this->faker->realText()
        ];
    }
}
