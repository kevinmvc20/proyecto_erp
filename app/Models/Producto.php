<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio_compra',
        'precio_venta',
        'tipo',
        'descripcion',
        'imagen',
        'eliminado',
        'categoria_id'
    ];

    public function Categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function Compraproducto(){
        return $this->hasMany(Compraproducto::class,'producto_id');
    }

    public function ProductoAlmacen(){
        return $this->hasMany(Productoalmacen::class,'producto_id');
    }
}
