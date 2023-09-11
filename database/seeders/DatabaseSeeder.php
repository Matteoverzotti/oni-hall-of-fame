<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contest;
use App\Models\SubContest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Contest::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create a Contest using the ContestFactory
        $contest = Contest::factory()->create();

        // Create multiple SubContests and associate them with the Contest
        $subContests = SubContest::factory()->count(8)->create(['contest_id' => $contest->id]);

        // You can also associate SubContests with different data if needed.
        // For example:
        // $subContests = SubContest::factory()->count(8)->create(['contest_id' => $contest->id, 'name' => 'Custom Name']);
    }
}
