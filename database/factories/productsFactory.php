<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class productsFactory extends Factory
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
        $name =  $this->faker->word;
        return [
            'name' => $name,
            'description' => $this->faker->text(200),
            'slug' => Str::slug($name),
            'image' => $this->faker->unique()->safeEmail,
            'price' => $this->faker->unique()->safeEmail,
            'quantity' => $this->faker->unique()->safeEmail,
            'is_active' => $this->faker->unique()->safeEmail,
            'category_id' => $this->faker->unique()->safeEmail,
            'brand_id' => $this->faker->unique()->safeEmail,
        ];

    }
}
