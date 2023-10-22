<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empresas = Empresa::all();
        return view('empresa.empresa.index',['empresas'=>$empresas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empresa.empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'direccion' => 'required',
            'gerente' => 'required|max:30',
            'nit' => 'required|unique:empresas',
            'nombre' => 'required|max:30',
            'rubro' => 'required',
            'email' => 'required|unique:empresas|max:60|email',
            'telefono' => 'required'
        ]);

        $empresas = new Empresa();
        $empresas->nombre = $request->nombre;
        $empresas->gerente = $request->gerente;
        $empresas->email = $request->email;
        $empresas->direccion = $request->direccion;
        $empresas->nit = $request->nit;
        $empresas->rubro = $request->rubro;
        $empresas->telefono = $request->telefono;
        $empresas->eliminado = false;
        $empresas->save();

        return redirect()->route('empresas.index');
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
