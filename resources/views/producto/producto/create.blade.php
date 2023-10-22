@extends('layouts.app')


@section('titulo')
    Pagina Principal
@endsection


@section('contenido')
    <div class="container mx-auto p-4">
        <div class="text-xl font-bold mb-4">Crear Producto</div>
        <form action="{{ route('productos.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block font-medium">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre..."
                    class=" w-2/4 p-2 border border-gray-300 rounded" value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="precio_compra" class="block font-medium">Precio Compra:</label>
                <input type="number" step="0.01" id="precio_compra" name="precio_compra" placeholder="0"
                    class="w-2/4 p-2 border border-gray-300 rounded" value="{{ old('precio_compra') }}" disabled>
                @error('precio_compra')
                    <span class="text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="precio_venta" class="block font-medium">Precio Venta:</label>
                <input type="number" step="0.01" id="precio_venta" name="precio_venta" placeholder="0"
                    class="w-2/4 p-2 border border-gray-300 rounded" value="{{ old('precio_venta') }}" disabled>
                @error('precio_venta')
                    <span class="text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tipo" class="block font-medium">Tipo:</label>
                <input type="text" id="tipo" name="tipo" placeholder="Tipo..."
                    class="w-2/4 p-2 border border-gray-300 rounded" value="{{ old('tipo') }}">
                @error('tipo')
                    <span class="text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block font-medium">Descripcion:</label>
                <input type="text" id="nit" name="descripcion" placeholder="Descripcion..."
                    class="w-2/4 p-2 border border-gray-300 rounded" value="{{ old('descripcion') }}">
                @error('descripcion')
                    <span class="text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="categoria_id" class="block font-medium mb-2 text-gray-700">Categoria:</label>
                <div class="relative">
                    <select name="categoria_id" id="categoria_id"
                        class="block w-2/4 px-4 py-2 pr-8 leading-5 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm focus:outline-none">
                        <option value="1">Seleccione una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                        <option value="0">Otra</option>
                    </select>
                </div>
                @error('categoria_id')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4" id="nueva_categoria" style="display: none;">
                <label for="nombre_categoria" class="block font-medium">Nueva Categoría:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria"
                    placeholder="Nombre de la nueva categoría..." class="w-2/4 p-2 border border-gray-300 rounded"
                    value="{{ old('nombre_categoria') }}">

            </div>
            @if (session('error'))
                <div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error:</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
                <button type="reset" class="bg-red-500 text-white p-2 rounded">Cancelar</button>
                <a href="{{ route('productos.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoria_id').change(function() {
                if ($(this).val() === '0') {
                    $('#nueva_categoria').show();
                } else {
                    $('#nueva_categoria').hide();
                }
            });
        });
    </script>
@endsection
