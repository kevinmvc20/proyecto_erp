<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('compra.proveedor.index',['proveedores' => $proveedores]);
    }

    public function create()
    {
        return view('compra.proveedor.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'direccion' => 'required',
            'nombre' => 'required|max:30',
            'nit' => 'required|unique:proveedores',
            'email' => 'required|unique:proveedores|max:60|email',
            'telefono' => 'required'
        ]);

        $proveedores = new Proveedor();
        $proveedores->nombre = $request->nombre;
        $proveedores->email = $request->email;
        $proveedores->direccion = $request->direccion;
        $proveedores->nit = $request->nit;
        $proveedores->telefono = $request->telefono;
        $proveedores->eliminado = false;
        $proveedores->save();

        return redirect()->route('proveedores.index');
    }
}
