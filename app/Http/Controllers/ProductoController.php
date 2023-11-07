<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::with('categoria')->get();
        return view('producto.producto.index',['productos'=> $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('producto.producto.create',['categorias'=> $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nombre' => 'required|max:30',
            'tipo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        $categoria_id = $request->categoria_id;
    $nombre_categoria = $request->nombre_categoria;

    if (empty($categoria_id) && !empty($nombre_categoria)) {
        // La categoría no se seleccionó pero se proporcionó un nombre de categoría

        // Verifica si la categoría ya existe en la base de datos
        $categoriaExistente = Categoria::where('nombre', $nombre_categoria)->first();

        if ($categoriaExistente) {
            // La categoría ya existe, muestra un mensaje de error y redirige de vuelta al formulario
            return redirect()->route('productos.create')->with('error', 'La categoría ya existe en la base de datos.');
        }

        // Si la categoría no existe, crea una nueva categoría
        $categorias = new Categoria();
        $categorias->nombre = $nombre_categoria;
        $categorias->eliminado=false;
        $categorias->save();
        $categoria_id = $categorias->id;
    }

        $productos = new Producto();
        $productos->nombre = $request->nombre;
        $productos->precio_compra = 0;
        $productos->precio_venta = 0;
        $productos->tipo = $request->tipo;
        $productos->descripcion = $request->descripcion;
        $productos->imagen =$request->imagen;
        $productos->categoria_id = $categoria_id;
        $productos->eliminado = false;
        $productos->save();

        return redirect()->route('productos.index');
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
