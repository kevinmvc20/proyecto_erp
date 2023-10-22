@extends('layouts.app')


@section('titulo')
    Pagina Sucursal
@endsection


@section('contenido')
<div class="container mx-auto p-4">
    <div class="text-xl font-bold mb-4">Crear Sucursal</div>
    <form action="{{ route('sucursales.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="mb-4">
            <label for="encargado" class="block font-medium">Encargado:</label>
            <input type="text" id="encargado" name="encargado" placeholder="Encargado..." class=" w-2/4 p-2 border border-gray-300 rounded" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}" value="{{ old('encargado') }}">
            @error('encargado')
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
            <label for="empresa_id" class="block font-medium mb-2 text-gray-700">Empresa:</label>
            <div class="relative">
                <select name="empresa_id" id="empresa_id" class="block w-2/4 px-4 py-2 pr-8 leading-5 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm focus:outline-none">
                    <option value="0">Seleccione una empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M7.293 9.293a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L10 10.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3z"/>
                    </svg>
                </div>
            </div>
            @error('empresa_id')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-4 mt-4">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
            <button type="reset" class="bg-red-500 text-white p-2 rounded">Cancelar</button>
            <a href="{{ route('sucursales.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
        </div>
    </form>
</div>


@endsection