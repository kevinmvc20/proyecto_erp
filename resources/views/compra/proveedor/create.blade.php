@extends('layouts.app')


@section('titulo')
    Pagina Proveedores
@endsection


@section('contenido')
<div class="container mx-auto p-4">
    <div class="text-xl font-bold mb-4">Crear Proveedores</div>
    <form action="{{ route('proveedores.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre..." class=" w-2/4 p-2 border border-gray-300 rounded" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}" value="{{ old('nombre') }}">
            @error('nombre')
            <span class="text-red-500"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="direccion" class="block font-medium">Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Dirección..." class="w-2/4 p-2 border border-gray-300 rounded" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}" value="{{ old('direccion') }}">
            @error('direccion')
            <span class="text-red-500"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="telefono" class="block font-medium">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" placeholder="Teléfono..." class="w-2/4 p-2 border border-gray-300 rounded" pattern="^[1-9]\d*(\.\d+)?$" value="{{ old('telefono') }}">
            @error('telefono')
            <span class="text-red-500"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block font-medium">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email..." class="w-2/4 p-2 border border-gray-300 rounded" value="{{ old('email') }}">
            @error('email')
            <span class="text-red-500"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="nit" class="block font-medium">Nit:</label>
            <input type="number" id="nit" name="nit" placeholder="Nit..." class="w-2/4 p-2 border border-gray-300 rounded" value="{{ old('nit') }}">
            @error('nit')
            <span class="text-red-500"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
            <button type="reset" class="bg-red-500 text-white p-2 rounded">Cancelar</button>
            <a href="{{ route('proveedores.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
        </div>
    </form>
</div>


@endsection