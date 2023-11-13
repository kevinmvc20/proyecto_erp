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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            
            $table->string('estado');
            $table->date('fecha');
            
            
            $table->decimal('total');
            $table->string('tipo_pago');
            $table->boolean('eliminado');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('user_id');
            
            $table->timestamps();

            $table->foreign('proveedor_id')->on('proveedores')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
