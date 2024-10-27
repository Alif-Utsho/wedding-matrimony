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
        Schema::create('user_images', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // Foreign key reference to users table
            $table->integer('user_profile_id'); // Foreign key reference to user_profiles table
            $table->string('image', 200); // Image file name with varchar(200)
            $table->tinyInteger('status')->default(1); // Status field with default value of 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_images');
    }
};
