@extends('layouts.app')


@section('titulo')
    Pagina de Compra
@endsection

@section('contenido')
    <div class="container mx-auto p-4">
        <div class="text-xl font-bold mb-4">Actualizar Compra</div>
        <form action="{{ route('compras.update', ['id' => $compra->id]) }}" method="POST" autocomplete="off">
            @csrf
            <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">

                <div class="mb-4">
                    <h2 class="text-2xl font-semibold mt-6 mb-4">Productos en la Compra</h2>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="text-left">Producto</th>
                                <th class="text-left">Cantidad</th>
                                <th class="text-left">Precio</th>
                                <th class="text-left">Importe IVA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compra->Compraproducto as $detalle)
                                <tr>
                                    <td>{{ $detalle->producto->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>{{ $detalle->precio }}</td>
                                    <td>{{ $detalle->importe_iva }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-4">
                    <label for="proveedor_id" class="block font-medium">Proveedor:</label>
                    <input type="text" id="proveedor_id" name="proveedor_id" placeholder="Proveedor..."
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ $compra->Proveedor->nombre }}" disabled>
                </div>

                <!-- Resto de los campos de compra (cantidad, estado, fecha, etc.) -->

                <div class="mb-4">
                    <label for="fecha" class="block font-medium">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" placeholder="Fecha..."
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ $compra->fecha }}" disabled>
                </div>


                <div class="mb-4">
                    <label for="total" class="block font-medium">Total:</label>
                    <input type="number" step="0.01" id="total" name="total" placeholder="0"
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ $compra->total }}" readonly disabled>

                </div>

                <div class="mb-4">
                    <label for="tipo_pago" class="block font-medium">Tipo Pago:</label>
                    <input type="text" id="tipo_pago" name="tipo_pago" placeholder="Tipo Pago..."
                        class="w-3/4 p-2 border border-gray-300 rounded" value="{{ $compra->tipo_pago }}">
                    @error('tipo_pago')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="estado" class="block font-medium">Estado de la Compra:</label>
                    <select name="estado" id="estado" class="w-full p-2 border border-gray-300 rounded">
                        @if ($compra->estado === 'cotizacion')
                            <option value="compra">Compra de Productos</option>
                        @elseif ($compra->estado === 'compra')
                            <option value="recepcion">Recepción de Productos</option>
                        @elseif ($compra->estado === 'recepcion')
                            <option value="recepcion" selected>finalizado el Proceso</option>
                        @endif
                        <!-- Puedes agregar más opciones de estado según tus necesidades -->
                    </select>
                </div>


                <div class="mb-4">
                    <div>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
                        <button type="reset" class="bg-red-500 text-white p-2 rounded">Cancelar</button>
                        <a href="{{ route('compras.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
