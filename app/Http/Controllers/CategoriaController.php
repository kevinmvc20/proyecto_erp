<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('producto.categoria.index',['categorias'=>$categorias]);
    }

    
    public function create()
    {
        return view('producto.categoria.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:categorias',
        ]);

        $categorias = new Categoria();
        $categorias->nombre = $request->nombre;
        $categorias->eliminado = false;
        $categorias->save();

        return redirect()->route('categorias.index');
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
