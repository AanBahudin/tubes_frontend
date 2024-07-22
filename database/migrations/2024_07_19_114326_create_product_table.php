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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rating');
            $table->string('description');
            $table->string('price');
            $table->string('image');
            // location
            $table->string('country');
            $table->string('city');
            // should be an array
            $table->string('reviews');
            $table->string('period_time');
            $table->string('facility');
            $table->string('bed_size');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
