@extends('layouts.app')


@section('titulo')
    Pagina Sucursal
@endsection


@section('contenido')

<div class="w-full max-w-screen-xl mx-auto p-6">
    <h3 class="text-2xl font-bold mb-6">Listado de Sucursal</h3>
    <a href="{{ route('sucursales.create') }}">
        <button class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4 hover:bg-green-600">
            Nuevo
        </button>
    </a>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-blue-500">Id</th>
                    <th class="px-4 py-2 bg-blue-500">Encargado</th>
                    <th class="px-4 py-2 bg-blue-500">Direccion</th>
                    <th class="px-4 py-2 bg-blue-500">Empresa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sucursales as $sucursal)
                <tr>
                    <td class="px-4 py-2 text-center">{{ $sucursal->id }}</td>
                    <td class="px-4 py-2 text-center">{{ $sucursal->encargado }}</td>
                    <td class="px-4 py-2 text-center">{{ $sucursal->direccion }}</td>
                    <td class="px-4 py-2 text-center">{{ $sucursal->empresa->nombre }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

  
@endsection