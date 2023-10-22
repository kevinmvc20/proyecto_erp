<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    //

    public function index()
{
    $suscripciones = Suscripcion::all();
    return view('suscripcion.suscripcion', compact('suscripciones'));
}
}
