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
            $table->string('nama');
            $table->string('tagline');
            $table->string('price');
            $table->string('categories');
            $table->text('description');
            $table->string('country');
            $table->string('image');
            $table->string('guest');
            $table->string('bedroom');
            $table->string('bed');
            $table->string('bath');
            $table->string('createdBy');
            $table->string('ownerName');
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
