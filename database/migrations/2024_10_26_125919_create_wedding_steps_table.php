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
        Schema::create('wedding_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200); // Title of the wedding event
            $table->text('description'); // Description of the wedding event
            $table->string('image', 200); // Path to the image
            $table->string('time', 50)->nullable(); // Time of the wedding event, nullable
            $table->unsignedBigInteger('wedding_id')->nullable(); // Foreign key to associate with the wedding, nullable
            $table->tinyInteger('status')->default(1); // Status field with a default value of 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_steps');
    }
};
