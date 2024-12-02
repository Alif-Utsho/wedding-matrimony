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
            $table->integer('user_id');
            $table->string('image', 200)->nullable();
            $table->string('bio')->nullable();
            $table->string('marital_status', 20);
            $table->string('gender', 10);
            $table->string('religion', 20)->nullable();
            $table->string('language', 20)->nullable();
            $table->integer('city_id');
            $table->date('birth_date');
            $table->integer('age');
            $table->string('height', 50)->nullable();
            $table->string('weight', 50)->nullable();
            $table->string('fathers_name', 100)->nullable();
            $table->string('mothers_name', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->tinyInteger('status')->default(1);
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
