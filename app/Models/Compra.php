<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'fecha',  
        'tipo_pago',
        'eliminado',
        'total',
        'proveedor_id',
        'user_id'
    ];

    public function Proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

    public function Compraproducto(){
        return $this->hasMany(Compraproducto::class,'compra_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

}
