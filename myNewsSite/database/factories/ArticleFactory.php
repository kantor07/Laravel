<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'   => fake()->numberBetween(1,10),
            'title'         => fake()->jobTitle(),
            'author'        => fake()->userName(),
            'status'        =>fake()->randomElement($array = array ('DRAFT','ACTIVE','BLOCKED')),
            'source_id'     => fake()->numberBetween(1,10),
            'image'         =>fake()->imageUrl(200,200),
            'description'   => fake()->text(100)
        ];
    }
}
