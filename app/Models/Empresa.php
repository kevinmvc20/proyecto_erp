<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'direccion',
        'gerente',
        'nit',
        'nombre',
        'rubro',
        'telefono',
        'email',
        'eliminado'
    ];

    public function Sucursal(){
        return $this->hasMany(Sucursal::class,'empresa_id');
    }
}
