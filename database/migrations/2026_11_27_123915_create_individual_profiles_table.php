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
        Schema::create('individual_profiles', function (Blueprint $table) {
            $table->id();

            // Connect profile to its user
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            // Basic profile information
            $table->string('profile_photo')->nullable();
            $table->string('location')->nullable();
            $table->string('headline')->nullable();
            $table->text('about')->nullable();

            // What the individual wants to use SkillConnect for
            $table->enum('interest_mode', [
                'offer_services',
                'find_employment',
                'both'
            ])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_profiles');
    }
};