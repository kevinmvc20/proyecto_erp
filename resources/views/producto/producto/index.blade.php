@extends('layouts.app')


@section('titulo')
    Pagina Principal
@endsection


@section('contenido')
    <div class="w-full max-w-screen-xl mx-auto p-6">
        <h3 class="text-2xl font-bold mb-6">Listado de Productos</h3>
        <a href="{{ route('productos.create') }}">
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
                        <th class="px-4 py-2 bg-blue-500">Precio Compra</th>
                        <th class="px-4 py-2 bg-blue-500">Precio Venta</th>
                        <th class="px-4 py-2 bg-blue-500">Tipo</th>
                        <th class="px-4 py-2 bg-blue-500">Imagen</th>
                        <th class="px-4 py-2 bg-blue-500">Descripcion</th>
                        <th class="px-4 py-2 bg-blue-500">Categoria</th>
                        <th class="px-4 py-2 bg-blue-500">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="px-4 py-2 text-center">{{ $producto->id }}</td>
                            <td class="px-4 py-2 text-center">{{ $producto->nombre }}</td>
                            <td class="px-4 py-2 text-center">{{ $producto->precio_compra }}</td>
                            <td class="px-4 py-2 text-center">{{ $producto->precio_venta }}</td>
                            <td class="px-4 py-2 text-center">{{ $producto->tipo }}</td>
                            <td class="px-4 py-2 text-center">
                                <a>
                                    <img class="w-[100px] h-[100px]" src="{{ asset('uploads') . '/' . $producto->imagen }}"
                                        alt="Imagen del producto{{ $producto->nombre }}">
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center">{{ $producto->descripcion }}</td>
                            <td class="px-4 py-2 text-center">{{ $producto->categoria->nombre }}</td>
                            <td class="px-4 py-2 text-center">
                                <button type="submit" class="bg-green-500 text-white p-2 rounded mb-2">Ver</button>
                                <button type="reset" class=" bg-red-500 text-white p-2 rounded mb-2">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
