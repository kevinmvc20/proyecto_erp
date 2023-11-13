<?php

namespace App\Observers;

use App\Models\Producto;
use App\Models\Compraproducto;

class CompraproductoObserver
{
    /**
     * Handle the Compraproducto "created" event.
     */
    public function created(Compraproducto $compraproducto): void
    {
        // if ($compraproducto->compra->estado === 'recepcion') {
        // // Accede al producto asociado al compraproducto
        // $producto = Producto::find($compraproducto->producto_id);

        // // Realiza los cálculos necesarios y actualiza el precio del producto
        // $Preciocompra = $compraproducto->precio;
        // $precioventa =  $compraproducto->precio + ($compraproducto->precio * 15) / 100;

        // // Actualiza el precio del producto
        // $producto->update(['precio_compra' => $Preciocompra, 'precio_venta' => $precioventa]);
        // }
    }

    /**
     * Handle the Compraproducto "updated" event.
     */
    public function updated(Compraproducto $compraproducto): void
    {
        //
    }

    /**
     * Handle the Compraproducto "deleted" event.
     */
    public function deleted(Compraproducto $compraproducto): void
    {
        //
    }

    /**
     * Handle the Compraproducto "restored" event.
     */
    public function restored(Compraproducto $compraproducto): void
    {
        //
    }

    /**
     * Handle the Compraproducto "force deleted" event.
     */
    public function forceDeleted(Compraproducto $compraproducto): void
    {
        //
    }
}
