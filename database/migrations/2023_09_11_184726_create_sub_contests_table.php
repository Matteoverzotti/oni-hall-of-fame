<?php

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
            $table->string('name');
            $table->string('name_id')->unique();
            $table->unsignedBigInteger('contest_id');
            $table->timestamps();
    
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
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
