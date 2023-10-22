@extends('layouts.app')


@section('titulo')
    Pagina Categoria
@endsection


@section('contenido')
<div class="container mx-auto p-4">
    <div class="text-xl font-bold mb-4">Crear Categoria</div>
    <form action="{{ route('categorias.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre..." class=" w-2/4 p-2 border border-gray-300 rounded" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}" value="{{ old('nombre') }}">
            @error('nombre')
            <span class="text-red-500"> {{ $message }} </span>
            @enderror
        </div>
        
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
            <button type="reset" class="bg-red-500 text-white p-2 rounded">Cancelar</button>
            <a href="{{ route('categorias.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
        </div>
    </form>
</div>


@endsection