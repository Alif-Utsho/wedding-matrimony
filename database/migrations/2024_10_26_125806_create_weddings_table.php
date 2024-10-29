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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->string('couple_name', 100); // Name of the couple
            $table->string('couple_image', 200); // Image of the couple
            $table->text('description')->nullable(); // Description of the couple, allowing NULL
            $table->string('location', 50)->nullable(); // Location, allowing NULL
            $table->string('thumbnail', 200)->nullable(); // Thumbnail image, allowing NULL
            $table->text('video')->nullable(); // Video link or description, allowing NULL
            $table->string('image1', 250)->nullable(); // Additional image 1, allowing NULL
            $table->string('image2', 250)->nullable(); // Additional image 2, allowing NULL
            $table->string('image3', 250)->nullable(); // Additional image 3, allowing NULL
            $table->date('date'); // Date associated with the couple
            $table->tinyInteger('status')->default(1); // Status field with default value of 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
