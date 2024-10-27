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
        Schema::create('wedding_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_id'); // Foreign key to associate with the wedding
            $table->string('image', 250); // Path to the image
            $table->tinyInteger('status')->default(1); // Status field with a default value of 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_galleries');
    }
};
