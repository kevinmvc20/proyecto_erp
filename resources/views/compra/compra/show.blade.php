@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="bg-white p-4 shadow rounded-lg">
            <h1 class="text-2xl font-semibold mb-4">Detalles de la Compra</h1>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="font-semibold">Proveedor:</p>
                    <p>{{ $compra->Proveedor->nombre }}</p>
                </div>
                <div>
                    <p class="font-semibold">Usuario:</p>
                    <p>{{ $compra->User->name }}</p>
                </div>
                <div>
                    <p class="font-semibold">Estado:</p>
                    <p>{{ $compra->estado }}</p>
                </div>
                <div>
                    <p class="font-semibold">Fecha:</p>
                    <p>{{ $compra->fecha }}</p>
                </div>
                <div>
                    <p class="font-semibold">Tipo de Pago:</p>
                    <p>{{ $compra->tipo_pago }}</p>
                </div>
                <div>
                    <p class="font-semibold">Total:</p>
                    <p>{{ $compra->total }}</p>
                </div>
            </div>

            <h2 class="text-2xl font-semibold mt-6 mb-4">Productos en la Compra</h2>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left">Producto</th>
                        <th class="text-left">Cantidad</th>
                        <th class="text-left">Precio</th>
                        <th class="text-left">Importe IVA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compra->Compraproducto as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->precio }}</td>
                            <td>{{ $detalle->importe_iva }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class=" mb-4 mt-4">
        <a href="{{ route('compras.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
    </div>
@endsection
