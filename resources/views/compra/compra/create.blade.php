@extends('layouts.app')

@section('titulo')
    Pagina de Compra
@endsection

@section('contenido')
    <div class="container mx-auto p-4">
        <div class="text-xl font-bold mb-4">Crear Compra</div>
        <form action="{{ route('compras.store') }}" method="POST" autocomplete="off">
            @csrf

            <div class="flex">
                <div class="md:w-1/2 p-10 bg-white rounded-lg mt-10 md:mt-0">

                    <div class="mb-4">
                        <label for="proveedor_id" class="block font-medium mb-2 text-gray-700">Proveedor:</label>
                        <div class="relative">
                            <select name="proveedor_id" id="proveedor_id"
                                class="block w-3/4 px-4 py-2 pr-8 leading-5 text-gray-700 bg-white border border-gray-300 
                            rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm 
                            focus:outline-none">
                                <option value="" disabled selected>Seleccione un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                                <option value="0">Otra</option>
                            </select>
                        </div>
                        @error('proveedor_id')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4" id="nueva_proveedor" style="display: none;">
                        <label for="nombre_proveedor" class="block font-medium">Nuevo Proveedor:</label>
                        <input type="text" id="nombre_proveedor" name="nombre_proveedor"
                            placeholder="Nombre del nuevo proveedor..."
                            class="w-3/4 p-2 border bg-green-200 border-gray-300 rounded"
                            value="{{ old('nombre_proveedor') }}">

                        <input type="number" id="nit" name="nit" placeholder="Nit del nuevo proveedor..."
                            class="w-3/4 p-2 border bg-green-200 border-gray-300 rounded" value="{{ old('nit') }}">

                        <input type="text" id="email" name="email" placeholder="Email del nuevo proveedor..."
                            class="w-3/4 p-2 border bg-green-200 border-gray-300 rounded" value="{{ old('email') }}">
                    </div>
                    @if (session('error'))
                        <div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error:</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif


                    <div class="mb-4">
                        <label for="fecha" class="block font-medium">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" placeholder="Fecha..."
                            class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('fecha') }}">
                        @error('fecha')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tipo_pago" class="block font-medium">Tipo Pago:</label>
                        <input type="text" id="tipo_pago" name="tipo_pago" placeholder="Tipo Pago..."
                            class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('tipo_pago') }}">
                        @error('tipo_pago')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="estado" class="block font-medium">Estado de la Compra:</label>
                        <select name="estado" id="estado" class="w-full p-2 border border-gray-300 rounded">
                            <option value="cotizacion">Cotización</option>
                            <option value="compra" disabled>Compra de Productos</option>
                            <option value="recepcion" disabled>Recepción de Productos</option>
                            <!-- Agrega más opciones de estado según tus necesidades -->
                        </select>
                    </div>


                </div>

                <!-- Aqui empieza lo de ingresar los datos de productos -->



                <div class="md:w-1/2 p-10 bg-white rounded-lg mt-10 md:mt-0">
                    <div class="mb-4">
                        <a href="{{ route('productos.create') }}" class="bg-green-500 text-white p-2 rounded">Crear un
                            Producto</a>
                    </div>

                    <div class="mb-4">
                        <label for="producto_id" class="block font-medium mb-2 text-gray-700">Producto:</label>
                        <div class=" relative">
                            <select name="producto_id" id="producto_id"
                                class="block w-3/4 px-4 py-2 pr-8 leading-5 text-gray-700 bg-white border border-gray-300 rounded-md
                            shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm focus:outline-none">
                                <option value="" disabled selected>Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Agrega los campos de precio, importe IVA, cantidad y el botón para agregar producto -->
                    <div class="mb-4">
                        <label for="precio" class="block font-medium">Precio:</label>
                        <input type="number" id="precio" name="precio" placeholder="Precio..."
                            class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('precio') }}">
                    </div>

                    <div class="mb-4">
                        <label for="importe_iva" class="block font-medium">Importe IVA:</label>
                        <input type="number" id="importe_iva" name="importe_iva" placeholder="Importe IVA..."
                            class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('importe_iva') }}">
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block font-medium">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad..."
                            class="w-3/4 p-2 border border-gray-300 rounded" value="{{ old('cantidad') }}">
                    </div>

                    <div class="mb-4">
                        <button type="button" id="agregar" class="bg-blue-500 text-white p-2 rounded">Agregar
                            Producto</button>
                    </div>

                    <!-- Tabla para mostrar los detalles de los productos -->
                    <div class="mb-4">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th class="px-4 py-2 bg-blue-500">Producto</th>
                                <th class="px-4 py-2 bg-blue-500">Precio</th>
                                <th class="px-4 py-2 bg-blue-500">Importe IVA</th>
                                <th class="px-4 py-2 bg-blue-500">Cantidad</th>
                                <th class="px-4 py-2 bg-blue-500">Total</th>
                            </thead>
                            <tbody>
                                <!-- Los detalles de los productos se agregarán dinámicamente aquí -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Campo para mostrar el total general -->
                    <div class="mb-4">
                        <label for="total" class="block font-medium">Total:</label>
                        <div id="total">0.00($us)</div>
                        <input type="hidden" name="total_pagar" id="total_pagar" value="0">
                    </div>

                    <!-- Resto de los campos de compra (proveedor, fecha, tipo_pago, estado, etc.) -->
                    <!-- Asegúrate de que los campos restantes se encuentren en esta vista y estén definidos de manera apropiada. -->

                    <!-- Botones para guardar y cancelar -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
                        <button type="reset" class="bg-red-500 text-white p-2 rounded">Cancelar</button>
                        <a href="{{ route('compras.index') }}" class="bg-green-500 text-white p-2 rounded">Atrás</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $(document).ready(function() {
            var productos = [];

            $('#agregar').click(function() {
                // Obtener los valores de producto, precio, importe de IVA y cantidad
                var productoId = $('#producto_id').val();
                var productoNombre = $('#producto_id option:selected').text();
                var precio = parseFloat($('#precio').val()) || 0;
                var importeIva = parseFloat($('#importe_iva').val()) || 0;
                var cantidad = parseInt($('#cantidad').val()) || 0;

                if (productoId && precio > 0 && cantidad > 0) {
                    var totalProducto = precio * cantidad + (precio * cantidad * importeIva / 100);
                    var producto = {
                        id: productoId,
                        nombre: productoNombre,
                        precio: precio,
                        importeIva: importeIva,
                        cantidad: cantidad,
                        total: totalProducto
                    };

                    productos.push(producto);

                    // Agregar el producto a la tabla
                    agregarProductoATabla(producto);

                    // Calcular el total general
                    calcularTotalGeneral();

                    // Limpiar los campos después de agregar
                    limpiarCampos();

                } else {
                    alert('Por favor, complete los campos de producto, precio y cantidad.');
                }
            });

            $('form').submit(function() {
                // Agrega los detalles de los productos como un campo oculto en el formulario
                $('<input>').attr({
                    type: 'hidden',
                    name: 'productos',
                    value: JSON.stringify(productos)
                }).appendTo(this);
            });

            function agregarProductoATabla(producto) {
                var fila = '<tr>' +
                    '<td class="px-4 py-2 text-center">' + producto.nombre + '</td>' +
                    '<td class="px-4 py-2 text-center">' + producto.precio + '</td>' +
                    '<td class="px-4 py-2 text-center">' + producto.importeIva + '</td>' +
                    '<td class="px-4 py-2 text-center">' + producto.cantidad + '</td>' +
                    '<td class="px-4 py-2 text-center">' + producto.total + '</td>' +
                    '</tr>';
                $('#detalles tbody').append(fila);
            }

            function calcularTotalGeneral() {
                var totalGeneral = 0;
                for (var i = 0; i < productos.length; i++) {
                    totalGeneral += productos[i].total;
                }
                $('#total').text(totalGeneral.toFixed(2) + '($us)');
                $('#total_pagar').val(totalGeneral);
            }

            function limpiarCampos() {
                $('#precio').val('');
                $('#importe_iva').val('');
                $('#cantidad').val('');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#proveedor_id').change(function() {
                if ($(this).val() === '0') {
                    $('#nueva_proveedor').show();
                } else {
                    $('#nueva_proveedor').hide();
                }
            });
        });
    </script>
@endsection
