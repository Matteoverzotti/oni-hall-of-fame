<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contest;
use App\Models\SubContest;
use App\Models\Contestant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a Contest using the ContestFactory
        Contest::factory()->count(7)->create();
        SubContest::factory(10)->create();
        Contestant::factory()->count(30)->create();

    }
}
