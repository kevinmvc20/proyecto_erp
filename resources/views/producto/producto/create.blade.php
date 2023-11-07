@extends('layouts.app')


@section('titulo')
    Pagina Principal
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')
    <div class="text-xl font-bold mb-4">Crear Producto</div>
    <div class="md:flex md:items-center">

        <div class ="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('productos.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block font-medium">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre..."
                        class=" w-3/4 p-2 border border-gray-300 rounded" value="{{ old('nombre') }}">
                    @error('nombre')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="precio_compra" class="block font-medium">Precio Compra:</label>
                    <input type="number" step="0.01" id="precio_compra" name="precio_compra" placeholder="0"
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('precio_compra') }}" disabled>
                    @error('precio_compra')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="precio_venta" class="block font-medium">Precio Venta:</label>
                    <input type="number" step="0.01" id="precio_venta" name="precio_venta" placeholder="0"
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('precio_venta') }}" disabled>
                    @error('precio_venta')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tipo" class="block font-medium">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" placeholder="Tipo..."
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('tipo') }}">
                    @error('tipo')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block font-medium">Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion..."
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('descripcion') }}">
                    @error('descripcion')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                    @error('imagen')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="categoria_id" class="block font-medium mb-2 text-gray-700">Categoria:</label>
                    <div class="relative">
                        <select name="categoria_id" id="categoria_id"
                            class="block w-3/4 px-4 py-2 pr-8 leading-5 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm focus:outline-none">
                            <option value="1">Seleccione una categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                            <option value="0">Otra</option>
                        </select>
                    </div>
                    @error('categoria_id')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4" id="nueva_categoria" style="display: none;">
                    <label for="nombre_categoria" class="block font-medium">Nueva Categoría:</label>
                    <input type="text" id="nombre_categoria" name="nombre_categoria"
                        placeholder="Nombre de la nueva categoría..." class="w-3/4 p-2 border border-gray-300 rounded"
                        value="{{ old('nombre_categoria') }}">

                </div>
                @if (session('error'))
                    <div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
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
