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
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('nombre_fantasia');
            $table->string('cuit');
            $table->string('email');
            $table->string('provincia')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('domicilio')->nullable();            
            $table->string('telefono')->nullable();
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa');
    }
};
