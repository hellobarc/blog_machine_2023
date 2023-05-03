<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(3);
        return [
            'title' => rtrim($title, '.'),
            'category_id' => 1,
            'meta_keyword' => rtrim($title, '.'),
            'meta_description' => $this->faker->paragraph(1),
            'thumbnail' => 'thumbnail'.rand(1,10).'.jpg',
            'page_title' => rtrim($title, '.'),
            'custom_date' => now(),
            'author_id' => 1,
            'is_featured' => '1',
            'is_premium' => '0',
            'tags' => rtrim($title, '.'),
        ];
    }
}
