@extends('layouts.app')


@section('titulo')
    Pagina Almacenes
@endsection


@section('contenido')

<div class="w-full max-w-screen-xl mx-auto p-6">
    <h3 class="text-2xl font-bold mb-6">Listado de Almacen</h3>
    <a href="{{ route('almacenes.create') }}">
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
                    <th class="px-4 py-2 bg-blue-500">Sucursal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($almacenes as $almacen)
                <tr>
                    <td class="px-4 py-2 text-center">{{ $almacen->id }}</td>
                    <td class="px-4 py-2 text-center">{{ $almacen->nombre }}</td>
                    <td class="px-4 py-2 text-center">{{ $almacen->direccion }}</td>
                    <td class="px-4 py-2 text-center">{{ $almacen->sucursal->direccion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

  
@endsection