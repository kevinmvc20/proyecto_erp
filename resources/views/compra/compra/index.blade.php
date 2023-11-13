@extends('layouts.app')

@section('titulo')
    Pagina Compra
@endsection

@section('contenido')
    <style>
        /* Define las clases CSS en línea */
        .estado-cotizacion {
            color: red;
        }

        .estado-compra {
            color: yellow;
        }

        .estado-recepcion {
            color: green;
        }
    </style>

    <div class="w-full max-w-screen-xl mx-auto p-6">
        <h3 class="text-2xl font-bold mb-6">Listado de Compras</h3>
        <a href="{{ route('compras.create') }}">
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4 hover:bg-green-600">
                Nueva Compra
            </button>
        </a>
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-blue-500">Id</th>

                        <th class="px-4 py-2 bg-blue-500">Estado</th>
                        <th class="px-4 py-2 bg-blue-500">Fecha</th>


                        <th class="px-4 py-2 bg-blue-500">Tipo Pago</th>
                        <th class="px-4 py-2 bg-blue-500">Total</th>
                        <th class="px-4 py-2 bg-blue-500">Proveedor</th>
                        <th class="px-4 py-2 bg-blue-500">Usuario</th>
                        <th class="px-4 py-2 bg-blue-500">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td class="px-4 py-2 text-center">{{ $compra->id }}</td>
                            <td
                                class="px-4 py-2 text-center
                                    @if ($compra->estado === 'cotizacion') estado-cotizacion
                                    @elseif ($compra->estado === 'compra')
                                        estado-compra
                                    @elseif ($compra->estado === 'recepcion')
                                        estado-recepcion @endif 
                                ">
                                {{ $compra->estado }}</td>
                            <td class="px-4 py-2 text-center">{{ $compra->fecha }}</td>
                            <td class="px-4 py-2 text-center">{{ $compra->tipo_pago }}</td>
                            <td class="px-4 py-2 text-center">{{ $compra->total }}</td>
                            <td class="px-4 py-2 text-center">{{ $compra->proveedor->nombre }}</td>
                            <td class="px-4 py-2 text-center">{{ $compra->user->username }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('compras.show', ['id' => $compra->id]) }}"
                                    class="bg-green-500 text-white p-2 rounded mb-2">Ver</a>

                                <a href="{{ route('compras.edit', ['id' => $compra->id]) }}"
                                    class="bg-yellow-500 text-white p-2 rounded mb-2">Actualizar</a>
                                <!-- Agrega el enlace para editar o eliminar la compra si es necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
