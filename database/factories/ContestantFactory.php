<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\SubContest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contestant>
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
            'sub_contest_id' => SubContest::inRandomOrder()->first()
        ];
    }
}
