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
        $contestantName = fake()->name();

        // Try to find an existing profile with the same name
        $profile = Profile::where('name', $contestantName)->first();

        if (!$profile) {
            // Create a new one
            $profile = Profile::factory()->create([
                'name' => $contestantName
            ]);
        }

        return [
            'sub_contest_id' => SubContest::inRandomOrder()->first(),
            'profile_id' => $profile->id,
            'name' => $contestantName
        ];
    }
}
