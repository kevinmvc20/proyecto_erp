<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'email',
        'direccion',
        'nit',
        'telefono',
        'eliminado'
    ];

    public function Compra(){
        return $this->hasMany(Compra::class,'proveedor_id');
    }
}
