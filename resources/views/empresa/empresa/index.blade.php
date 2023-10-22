@extends('layouts.app')


@section('titulo')
    Pagina Empresa
@endsection


@section('contenido')

<div class="w-full max-w-screen-xl mx-auto p-6">
    <h3 class="text-2xl font-bold mb-6">Listado de Empresa</h3>
    <a href="{{ route('empresas.create') }}">
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
                    <th class="px-4 py-2 bg-blue-500">Gerente</th>
                    <th class="px-4 py-2 bg-blue-500">Rubro</th>
                    <th class="px-4 py-2 bg-blue-500">Telefono</th>
                    <th class="px-4 py-2 bg-blue-500">Email</th>
                    <th class="px-4 py-2 bg-blue-500">NIT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                <tr>
                    <td class="px-4 py-2 text-center">{{ $empresa->id }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->nombre }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->direccion }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->gerente }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->rubro }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->telefono }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->email }}</td>
                    <td class="px-4 py-2 text-center">{{ $empresa->nit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

  
@endsection