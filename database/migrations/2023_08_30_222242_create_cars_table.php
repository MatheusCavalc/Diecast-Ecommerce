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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->boolean('published')->default(false);

            $table->foreignId('category_id')->constrained();

            $table->string('image');
            $table->string('name');
            $table->longText('description');

            $table->string('slug', 2000);

            $table->string('price');
            $table->string('promotion_price')->nullable();
            $table->boolean('in_promotion')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
