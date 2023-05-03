<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        // $categories = ['category', 'category-2', 'category-3'];
        // $factory->define(Category::class, function (Faker $faker)use($categories) {
        //     $categoryName= $categories[$faker->numberBetween(0,count($categories)-1)];
        return [
            'cat_name' => $this->faker->word,
            'parent_id' => 1,
            'meta_keyword' => rtrim($title, '.'),
            'meta_description' => $this->faker->paragraph(1),
            'page_title' =>  rtrim($title, '.'),
            'thumbnail' => 'image_'.rand(1,100).'.jpg',
            'featured_image' => 'image_'.rand(1,100).'.jpg',
        ];
    // });
    }
}
