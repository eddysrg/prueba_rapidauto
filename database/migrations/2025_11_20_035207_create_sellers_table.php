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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->nullable(); // El id que tiene en la API 
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->json('address')->nullable();
            $table->string('phone');
            $table->string('website');
            $table->json('company')->nullable();
            $table->foreignId('lot_id')->constrained('lots')->onDelete('restrict'); // Con 'restrict' se evita eliminar lote si tiene vendedor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
