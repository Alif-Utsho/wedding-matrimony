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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->string('image', 200);
            $table->string('tag', 100)->nullable();
            $table->string('short_description', 250)->nullable();
            $table->string('author_image', 200)->nullable();
            $table->string('author_name', 100)->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('front_page')->default(0);
            $table->tinyInteger('trending')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
