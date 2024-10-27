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
        Schema::create('user_careers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // Foreign key reference to users table
            $table->integer('user_profile_id'); // Foreign key reference if needed
            $table->string('type', 30);
            $table->string('company_name', 200)->nullable();
            $table->string('salary', 20)->nullable();
            $table->string('experience', 20)->nullable();
            $table->string('degree', 100)->nullable();
            $table->string('college', 200)->nullable();
            $table->string('school', 200)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_careers');
    }
};
