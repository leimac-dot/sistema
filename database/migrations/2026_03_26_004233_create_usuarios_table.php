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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // ID autoincremental [cite: 61]
            $table->string('nombre'); // Campo para el nombre del usuario [cite: 62]
            $table->string('email')->unique(); // Campo para el correo electrónico único [cite: 63]
            $table->timestamps(); // Campos created_at y updated_at [cite: 64]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};