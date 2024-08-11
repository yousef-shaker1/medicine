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
        Schema::create('medicine_importants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pharmacy_owner_id')->constrained('pharmacy_owners')->cascadeOnDelete();
            $table->string('medicine_name');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_importants');
    }
};
