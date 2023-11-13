<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Compraproducto;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    
    public function index()
    {
        $compras = Compra::with('user','proveedor')->get();
        return view('compra.compra.index',['compras'=>$compras]);
    }

   
    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();

        return view('compra.compra.create',['proveedores'=>$proveedores,'productos'=> $productos]);
    }

    
    public function store(Request $request)
    {

        // Crear una nueva instancia de Compra
        $compra = new Compra();
        
        $compra->estado = $request->estado;
        $compra->fecha = $request->fecha;
        $compra->tipo_pago = $request->tipo_pago;
        $compra->total = $request->total_pagar;
        $compra->eliminado = false;

        // Obtener el ID del proveedor o crear uno nuevo si es necesario
        $proveedor_id = $request->proveedor_id;
        $nombre_proveedor = $request->nombre_proveedor;

        if (empty($proveedor_id) && !empty($nombre_proveedor)) {
            $proveedorExistente = Proveedor::where('nombre', $nombre_proveedor)->first();

            if ($proveedorExistente) {
                return redirect()->route('compras.create')->with('error', 'El proveedor ya existe en la base de datos.');
            }

            //Si el proveedor no existe en la base de datos se lo crea

            $proveedor = new Proveedor();
            $proveedor->nombre = $nombre_proveedor;
            $proveedor->email = $request->email;
            $proveedor->direccion = "sin registrar";
            $proveedor->nit = $request->nit;
            $proveedor->telefono = 0;
            $proveedor->eliminado = false;
            $proveedor->save();
            $proveedor_id = $proveedor->id;
        }

        // Asignar los valores al modelo Compra
        $compra->proveedor_id = $proveedor_id;
        $compra->user_id = auth()->user()->id;
        $productos = json_decode($request->productos);

        // Guardar la compra en la base de datos
        $compra->save();

        // dd($request->productos);

        // Ahora, guarda los detalles de los productos en la tabla intermedia (CompraDetalle)
        foreach ($productos as $producto) {
            $compraproducto = new Compraproducto();
            $compraproducto->cantidad = $producto->cantidad;
            $compraproducto->precio = $producto->precio;
            $compraproducto->importe_iva = $producto->importeIva;
            $compraproducto->producto_id = $producto->id;
            $compraproducto->eliminado = false;
            $compraproducto->compra_id = $compra->id; // Asocia el detalle con la compra creada
            $compraproducto->save();
        }

        return redirect()->route('compras.index');
    }




    public function show($id)
    {
        $compra = Compra::with('Proveedor', 'User', 'Compraproducto')->find($id);

        if (!$compra) {
            return redirect()->route('compras.index')->with('error', 'Compra no encontrada.');
        }

        return view('compra.compra.show', compact('compra'));
    }


    
    public function edit($id)
    {
        $compra = Compra::with('Proveedor','User','Compraproducto')->find($id);

        return view('compra.compra.edit',compact('compra'));
    }

    
    public function update(Request $request,$id)
    {
        

        // Crear una nueva instancia de Compra
        $compra = Compra::findOrFail($id);
        
        $compra->estado = $request->estado;
        $compra->save();
    
        return redirect()->route('compras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
