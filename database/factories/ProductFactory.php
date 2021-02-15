<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(rand(2, 5), true),
            'description' => $this->faker->text,
            'price' => rand(1000, 100000),
        ];
    }
}
