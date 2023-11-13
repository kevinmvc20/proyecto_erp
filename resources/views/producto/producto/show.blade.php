@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class=" bg-white p-4 shadow rounded-lg">
            <h1 class="text-2xl font-semibold mb-4">Detalles del Producto</h1>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <a>
                        <img class="w-[200px] h-[200px]" src="{{ asset('uploads') . '/' . $producto->imagen }}"
                            alt="Imagen del producto{{ $producto->nombre }}">
                    </a>
                </div>
                <div>
                    <p class=" font-semibold">Producto</p>
                    <p>{{ $producto->nombre }}</p>
                </div>

                <div>
                    <p class=" font-semibold">Precio Compra</p>
                    <p>{{ $producto->precio_compra }}</p>
                </div>

                <div>
                    <p class=" font-semibold">Precio Venta</p>
                    <p>{{ $producto->precio_venta }}</p>
                </div>

                <div>
                    <p class=" font-semibold">Tipo</p>
                    <p>{{ $producto->tipo }}</p>
                </div>

                <div>
                    <p class=" font-semibold">Categoria</p>
                    <p>{{ $producto->categoria_id }}</p>
                </div>

                <div>
                    <p class=" font-semibold">Descripcion</p>
                    <p>{{ $producto->descripcion }}</p>
                </div>

            </div>

        </div>

    </div>
    <div class=" mb-4 mt-4">
        <a href="{{ route('productos.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
    </div>
@endsection
