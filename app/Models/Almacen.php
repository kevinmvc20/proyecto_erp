<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';

    protected $fillable = [
        'nombre',
        'direccion',
        'eliminado',
        'sucursal_id'
    ];

    public function Sucursal(){
        return $this->belongsTo(Sucursal::class,'sucursal_id');
    }

    public function ProductoAlmacen(){
        return $this->hasMany(Productoalmacen::class,'almacen_id');
    }
}
