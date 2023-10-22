<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $almacenes = Almacen::with('sucursal')->get();
        return view('empresa.almacen.index',['almacenes'=> $almacenes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sucursales = Sucursal::all();
        return view('empresa.almacen.create',['sucursales'=>$sucursales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'direccion' => 'required',
            'nombre' => 'required|max:30',
            'sucursal_id' => 'required',
        ]);

        $almacenes = new Almacen();
        $almacenes->nombre = $request->nombre;
        $almacenes->direccion = $request->direccion;
        $almacenes->sucursal_id = $request->sucursal_id;
        $almacenes->eliminado = false;
        $almacenes->save();

        return redirect()->route('almacenes.index');
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
