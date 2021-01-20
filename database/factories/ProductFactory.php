<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(2,500),
            'provider' => $this->faker->company,
            'expiration_date' => $this->faker->dateTimeBetween('now', '+120 days'),
            'manufacturing_date' => $this->faker->dateTimeBetween('-120 days')
        ];
    }
}
