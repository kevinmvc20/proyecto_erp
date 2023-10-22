@extends('layouts.app')


@section('titulo')
    Pagina Proveedores
@endsection


@section('contenido')

<div class="w-full max-w-screen-xl mx-auto p-6">
    <h3 class="text-2xl font-bold mb-6">Listado de Proveedores</h3>
    <a href="{{ route('proveedores.create') }}">
        <button class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4 hover:bg-green-600">
            Nuevo
        </button>
    </a>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-blue-500">Id</th>
                    <th class="px-4 py-2 bg-blue-500">Nombre</th>
                    <th class="px-4 py-2 bg-blue-500">Direccion</th>
                    <th class="px-4 py-2 bg-blue-500">Telefono</th>
                    <th class="px-4 py-2 bg-blue-500">Email</th>
                    <th class="px-4 py-2 bg-blue-500">NIT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                <tr>
                    <td class="px-4 py-2 text-center">{{ $proveedor->id }}</td>
                    <td class="px-4 py-2 text-center">{{ $proveedor->nombre }}</td>
                    <td class="px-4 py-2 text-center">{{ $proveedor->direccion }}</td>
                    <td class="px-4 py-2 text-center">{{ $proveedor->telefono }}</td>
                    <td class="px-4 py-2 text-center">{{ $proveedor->email }}</td>
                    <td class="px-4 py-2 text-center">{{ $proveedor->nit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

  
@endsection