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
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // Assuming each freelancer corresponds to a user
            $table->string('name');
            $table->string('profile_picture')->nullable();
            $table->string('tagline')->nullable();
            $table->text('about')->nullable();
            $table->text('skills');
            $table->string('portfolio_url')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancers');
    }
};
