@extends('layouts.app')


@section('titulo')
    Pagina de Compra
@endsection


@section('contenido')
<div>
    <div>
        <h3>Crear Proveedor</h3>
    </div>
</div>
<form action="{{ route('proveedores.store') }}" method="POST" autocomplete="off">
    @csrf
    <div>
        <div>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}" value="{{ old('nombre') }}">
                @error('nombre')
                <span> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Direccion..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}" value="{{ old('direccion') }}">
                @error('direccion')
                <span> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <label for="telefono">Telefono:</label>
                <input type="number" id="telefono" name="telefono" placeholder="telefono..." pattern="^[1-9]\d*(\.\d+)?$" value="{{ old('telefono') }}">
                @error('telefono')
                <span> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email..." value="{{ old('email') }}">
                @error('email')
                <span> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <button type="submit">Guardar</button>
                <button type="reset">Cancelar</button>
                <a href="{{ route('proveedores.index') }}" class="btn btn-success">Atras</a>
            </div>
        </div>
    </div>
</form>

@endsection
