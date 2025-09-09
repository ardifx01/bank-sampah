<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('collection_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id')->constrained()->onDelete('cascade');
            $table->string('waste_type');
            $table->decimal('weight_in_kg', 8, 2);
            $table->integer('points_per_kg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('collection_details');
    }
};