<?php

use App\Models\Contest;
use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_contests', function (Blueprint $table) {
            $table->id();

            // Subcontest id linking to the contest
            $table->foreignIdFor(Contest::class, 'contest_id')->constrained('contests');

            // Subcontest name and slug name
            $table->string('name');
            $table->string('name_id')->unique();

            // Subcontest location and date
            $table->string('location');
            $table->string('date');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_contests');
    }
};
