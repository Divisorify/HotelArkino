<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'type' => $this->faker->text(255),
            'persons' => $this->faker->numberBetween(0, 5),
            'beds' => $this->faker->text(255),
            'price' => $this->faker->text(255),
            'area' => $this->faker->numberBetween(0, 9223372036854775807),
        ];
    }
}
