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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // Foreign key reference to users table
            $table->string('image', 200)->nullable(); // Image file name with varchar(200), allowing NULL
            $table->string('gender', 10); // Gender field
            $table->integer('city_id'); // Foreign key reference to cities table
            $table->date('birth_date'); // Birth date
            $table->integer('age'); // Age
            $table->string('height', 50)->nullable(); // Height field, allowing NULL
            $table->string('weight', 50)->nullable(); // Weight field, allowing NULL
            $table->string('fathers_name', 100)->nullable(); // Father's name, allowing NULL
            $table->string('mothers_name', 100)->nullable(); // Mother's name, allowing NULL
            $table->string('address', 200)->nullable(); // Address field, allowing NULL
            $table->tinyInteger('status')->default(1); // Status field with default value of 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
