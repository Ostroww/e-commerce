<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => Str::random(),
            'description' => Str::random(),
            'prix' => rand(1, 500),
            'coeur' => (bool) rand(0, 1),
            'cover' => $this->faker->imageUrl(),
            'couleurs' => ['bleu', 'rouge'],
            'category_id' => 1,
            'slug' => Str::slug(str::random(), '-'),
        ];
    }
}
