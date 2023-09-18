<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use \App\Models\Contest;
use \App\Models\SubContest;
use \App\Models\Contestant;
use \App\Models\Profile;

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
    public function definition(): array {
        $name = 'ONI 2023 clasa a ' . fake()->numberBetween(1, 100);
        $name_id = Str::uuid();

        return [
            'contest_id' => Contest::inRandomOrder()->first()->id,
            'name' => $name,
            'name_id' => $name_id,
            'location' => fake()->country(),
            'date' => fake()->date()
        ];
    }
}
