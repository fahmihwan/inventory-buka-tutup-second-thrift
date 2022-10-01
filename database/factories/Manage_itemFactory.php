<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manage_item>
 */
class Manage_itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'receiving_id' => fake()->randomElement([1, 2, 3]),
            'qty'  => fake()->randomDigit(1),
        ];
    }
}
