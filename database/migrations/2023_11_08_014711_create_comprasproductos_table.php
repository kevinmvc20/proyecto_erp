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
        Schema::create('comprasproductos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('importe_iva');
            $table->decimal('precio');
            $table->boolean('eliminado');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('compra_id');
            $table->timestamps();

            $table->foreign('producto_id')->on('productos')->references('id')->onDelete('cascade');
            $table->foreign('compra_id')->on('compras')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprasproductos');
    }
};
