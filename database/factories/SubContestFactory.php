<?php

namespace Database\Factories;

use App\Models\SubContest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use \App\Models\Contest;

/**
 * @extends Factory<SubContest>
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
        $contest_id = Contest::inRandomOrder()->first()->id;

        return [
            'contest_id' => $contest_id,
            'name' => $name,
            'name_id' => $name_id,
            'location' => Contest::where('id', $contest_id)->first()->location,
            'date' => Contest::where('id', $contest_id)->first()->date,
        ];
    }
}
