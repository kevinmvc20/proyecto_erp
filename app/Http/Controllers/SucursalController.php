<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sucursales = Sucursal::with('empresa')->get();
        return view('empresa.sucursal.index',['sucursales'=>$sucursales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $empresas= Empresa::all();
        return view('empresa.sucursal.create',['empresas'=>$empresas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'direccion' => 'required',
            'encargado' => 'required|max:30',
            'empresa_id' => 'required',
        ]);

        $sucursales = new Sucursal();
        $sucursales->encargado = $request->encargado;
        $sucursales->empresa_id = $request->empresa_id;
        $sucursales->direccion = $request->direccion;
        $sucursales->eliminado = false;
        $sucursales->save();

        return redirect()->route('sucursales.index');

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
