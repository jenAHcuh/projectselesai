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
        //
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->decimal('price', 10, 2);
            $table->decimal('original_price', 10, 2)->nullable();

            $table->string('image')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('material')->nullable();

            $table->string('category')->nullable();
            $table->string('tags')->nullable();

            $table->decimal('rating', 2, 1)->default(0);
            $table->unsignedInteger('review_count')->default(0);

            // Scarcity / urgency information
            $table->unsignedInteger('sold_count')->default(0);
            $table->unsignedTinyInteger('sold_percentage')->default(0);
            $table->unsignedInteger('time_left')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('products');
    }
};
