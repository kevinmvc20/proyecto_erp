<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table ='sucursales';

    protected $fillable = [
        'direccion',
        'nombre',
        'encargado',
        'eliminado',
        'empresa_id'
    ];

    public function Empresa(){
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function Almacen(){
        return $this->hasMany(Almacen::class,'sucursal_id');
    }
}
