<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

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
            'name' => array('موبایل', 'کامپیوتر', 'سیستم')[rand(0,2)] . rand(1,100),
            'price' => rand(500000, 500000000),
            'quantity' => rand(1, 10),
            'discount' => rand(0,100)
        ];
    }
}
