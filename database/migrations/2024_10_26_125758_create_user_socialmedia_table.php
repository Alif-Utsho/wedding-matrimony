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
        Schema::create('user_socialmedia', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // Foreign key reference to users table
            $table->integer('user_profile_id'); // Foreign key reference to user_profiles table
            $table->string('whatsApp', 200)->nullable(); // WhatsApp link, allowing NULL
            $table->string('facebook', 200)->nullable(); // Facebook link, allowing NULL
            $table->string('instagram', 200)->nullable(); // Instagram link, allowing NULL
            $table->string('x', 200)->nullable(); // X (formerly Twitter) link, allowing NULL
            $table->string('youtube', 200)->nullable(); // YouTube link, allowing NULL
            $table->string('linkedin', 200)->nullable(); // LinkedIn link, allowing NULL
            $table->tinyInteger('status')->default(1); // Status field with default value of 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_socialmedia');
    }
};
