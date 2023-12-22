<?php

namespace Database\Factories;

use App\Models\Contestant;
use App\Models\Profile;
use App\Models\SubContest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contestant>
 */
class ContestantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sub_contest_id' => SubContest::inRandomOrder()->first()->id,
            'place' => fake()->randomNumber(),
            'team' => 'Romania',
            'region' => fake()->city(),
            'medal' => collect(["Aur", "Argint", "Bronz"])->random(),
            'prize' => collect([
                "Premiul 1",
                "Premiul 2",
                "Premiul 3",
                "Mențiune",
                "Mențiune Specială"
            ])->random()
        ];
    }
}
