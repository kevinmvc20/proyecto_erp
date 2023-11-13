<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compraproducto extends Model
{
    use HasFactory;
    protected $table = 'comprasproductos';


    protected $fillable = [
        'cantidad',
        'importe_iva',
        'precio',
        'eliminado',
        'producto_id',
        'compra_id'
    ];

    public function Producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }

    public function Compra(){
        return $this->belongsTo(Compra::class,'compra_id');
    }
}
