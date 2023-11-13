<?php

namespace App\Observers;

use App\Models\Compra;
use App\Models\Compraproducto;

class CompraObserver
{
    
    public function updated(Compra $compra)
    {
        if ($compra->estado === 'recepcion' && $compra->isDirty('estado')) {
            $this->actualizarPreciosProductos($compra);
        }
    }

    protected function actualizarPreciosProductos(Compra $compra)
    {
        // Obtiene los productos asociados a la compra a través de Compraproducto
        $productos = $compra->compraproducto()->with('producto')->get();

        // Actualiza los precios de los productos
        foreach ($productos as $compraproducto) {
            $producto = $compraproducto->producto;
            $producto->precio_compra = $compraproducto->precio;
            $producto->precio_venta = $compraproducto->precio + ($compraproducto->precio * 15) / 100;
            $producto->save();
        }
    }
}
