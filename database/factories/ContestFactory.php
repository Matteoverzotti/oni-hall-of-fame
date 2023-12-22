<?php

namespace Database\Factories;

use App\Models\Contest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Contest>
 */
class ContestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true); // Generate a unique contest name
        $name_id = Str::slug($name, '_');

        return [
            'name' => $name,
            'name_id' => $name_id,
            'location' => fake()->country(),
            'date' => fake()->date()
        ];
    }
}
