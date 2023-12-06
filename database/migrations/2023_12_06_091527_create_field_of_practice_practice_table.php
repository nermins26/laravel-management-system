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
        Schema::create('field_of_practice_practice', function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
            $table->foreignUuid('practice_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('field_of_practice_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_of_practice_practice');
    }
};
