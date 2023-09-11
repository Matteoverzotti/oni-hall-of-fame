<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubContest>
 */
class SubContestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = 'ONI 2023 clasa a ' . fake()->numberBetween(1, 100);
        $name_id = Str::slug($name, '_');

        return [
            'name' => $name,
            'name_id' => $name_id
        ];
    }
}
