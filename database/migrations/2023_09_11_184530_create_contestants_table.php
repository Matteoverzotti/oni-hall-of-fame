<?php

use App\Models\Profile;
use App\Models\SubContest;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Whoops\Handler\PlainTextHandler;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contestants', function (Blueprint $table) {
            $table->id();

            // Each contestant can participate in only one subcontest (or contest)
            // And each one has only one profile
            $table->foreignIdFor(SubContest::class, 'sub_contest_id')->constrained('sub_contests');
            $table->foreignIdFor(Profile::class, 'profile_id')->constrained('profiles');

            $table->integer('place', false, true);
            $table->string('name');
            $table->string('team'); // commonly used as school
            $table->string('region'); // județ
            $table->string('medal');
            $table->string('prize');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contestants');
    }
};
