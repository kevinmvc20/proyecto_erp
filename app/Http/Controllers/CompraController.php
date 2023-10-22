<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all();
        return view('compra.compra.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compra.compra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compras = new Compra();
        $compras->cantidad= $request->cantidad;
        $compras->estado = $request->estado;
        $compras->fecha = $request->fecha;
        $compras->importe_iva = $request->importe_iva;
        $compras->precio = $request->precio;
        $compras->tipo_pago = $request->tipo_pago;
        $compras->eliminado = false;
        $compras->save();

        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
