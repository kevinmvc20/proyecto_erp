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
        Schema::create('productoalmacenes', function (Blueprint $table) {
            $table->id();
            $table->integer('stock');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('almacen_id');
            $table->timestamps();

            $table->foreign('producto_id')->on('productos')->references('id')->onDelete('cascade');
            $table->foreign('almacen_id')->on('almacenes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productoalmacenes');
    }
};
