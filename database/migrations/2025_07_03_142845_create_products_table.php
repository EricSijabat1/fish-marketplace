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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific_name')->nullable();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->enum('unit', ['kg', 'ekor', 'ikat']);
            $table->string('catch_location')->default('Danau Toba');
            $table->date('catch_date');
            $table->enum('freshness_level', ['sangat_segar', 'segar', 'cukup_segar']);
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->foreignId('seller_id')->constrained('users');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
