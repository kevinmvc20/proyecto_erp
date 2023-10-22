<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productoalmacen extends Model
{
    use HasFactory;

    protected $table = 'productoalmacenes';

    protected $fillable = [
        'stock',
        'producto_id',
        'almacen_id'
    ];

    public function Almacen(){
        return $this->belongsTo(Almacen::class,'almacen_id');
    }

    public function Producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
