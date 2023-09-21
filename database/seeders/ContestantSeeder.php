<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contestant;
use App\Models\Profile;
use App\Models\SubContest;

class ContestantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Specify the user (contestant) name
        $userName = fake()->name();

        // Try to find an existing profile with the same name
        $profile = Profile::where('name', $userName)->first();

        if (!$profile) {
            // Create a new profile
            $profile = Profile::factory()->create([
                'name' => $userName
            ]);
        }

        Contestant::factory()->create([
            'name' => $userName,
            'sub_contest_id' => SubContest::inRandomOrder()->first()->id,
            'profile_id' => $profile->id,
        ]);
    }
}
