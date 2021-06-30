<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
        $c = Category::all("id")->count();
        $b = Brand::all("id")->count();
        return [
            "name"=>$this->faker->name(),
            "description"=>$this->faker->text(35),
            "price"=>$this->faker->numberBetween(0, 10000),
            "qty"=>$this->faker->numberBetween(0, 200),
            "brand_id"=>$this->faker->numberBetween(1, "$b"),
            "category_id"=>$this->faker->numberBetween(1, "$c")
        ];
    }
}
