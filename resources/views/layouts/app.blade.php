<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')

    <title>ProyectoERP - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


    <script src="https://kit.fontawesome.com/4c2bc02174.js" crossorigin="anonymous"></script>

</head>

<body class="">
    @auth
        <header class=" p-5  bg-gradient-to-b from-sky-800 to-sky-600 shadow">
            <div class="mx-auto flex justify-between items-center">
                <a href="{{ route('posts.index') }}">
                    <h1 class="text-3xl font-black">
                        ProyectoERP
                    </h1>
                </a>


                <nav class="flex gap-2 items-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-sm" href="{{ route('logout') }}">
                            Cerrar Sesion
                        </button>
                    </form>
                </nav>


                {{-- <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
            </nav> --}}
            </div>
        </header>

        <div class="flex">
            {{-- @if (auth()->user()->hasActiveSubscription()) --}}

            <aside class="w-64 min-h-screen">
                {{-- <div class="p-6">
                    <a href="" class="text-sky-700 text-3xl font-bold hover:text-black">
                        <i class="fas fa-user-cog mr-3"></i>Admin
                    </a>
                </div> --}}
                <nav class="p-2">
                    <a href="#"
                        class="flex items-center font-bold text-sky-700  opacity-75 hover:text-black py-4 pl-4 nav-item has-submenu"
                        onclick="toggleSubMenu(this)">
                        <i class="fa-solid fa-user mr-3"></i>
                        Gestionar Usuarios
                    </a>
                    <ul class="submenu hidden">
                        <li class="hover:bg-sky-200  hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="#">Opción 1</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="#">Opción 2</a></li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>


                    <a href="#"
                        class="flex items-center font-bold text-sky-700 opacity-75 hover:text-black  py-4 pl-4 nav-item has-submenu"
                        onclick="toggleSubMenu(this)">
                        <i class="fa-solid fa-building mr-3"></i>
                        Gestionar Empresa
                    </a>
                    <ul class="submenu hidden">
                        <li class="hover:bg-sky-200  hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('empresas.index') }}">Empresa</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('sucursales.index') }}">Sucursal</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('almacenes.index') }}">Almacen</a></li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>

                    <a href="#"
                        class="flex items-center font-bold text-sky-700 opacity-75 hover:text-black  py-4 pl-4 nav-item"
                        onclick="toggleSubMenu(this)">
                        <i class="fa-solid fa-layer-group mr-3"></i>
                        Gestionar Productos
                    </a>
                    <ul class="submenu hidden">
                        <li class="hover:bg-sky-200  hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('productos.index') }}">Producto</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('categorias.index') }}">Categoria</a></li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>


                    <a href="#"
                        class="flex items-center font-bold text-sky-700 opacity-75 hover:text-black  py-4 pl-4 nav-item"
                        onclick="toggleSubMenu(this)">
                        <i class="fa-solid fa-truck mr-3"></i>
                        Gestionar Compra
                    </a>
                    <ul class="submenu hidden">
                        <li class="hover:bg-sky-200  hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('proveedores.index') }}">Proveedores</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="{{ route('compras.index') }}">Compras</a></li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>


                    <a href="#"
                        class="flex items-center font-bold text-sky-700 opacity-75 hover:text-black  py-4 pl-4 nav-item"
                        onclick="toggleSubMenu(this)">
                        <i class="fa-solid fa-cart-shopping mr-3"></i>
                        Gestionar Venta
                    </a>
                    <ul class="submenu hidden">
                        <li class="hover:bg-sky-200  hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="#">Opción 1</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="#">Opción 2</a></li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>


                    <a href="#"
                        class="flex items-center font-bold text-sky-700 opacity-75 hover:text-black  py-4 pl-4 nav-item"
                        onclick="toggleSubMenu(this)">
                        <i class="fa-solid fa-flag mr-3"></i>
                        Reporte
                    </a>
                    <ul class="submenu hidden">
                        <li class="hover:bg-sky-200  hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="#">Opción 1</a></li>
                        <li class="hover:bg-sky-200 hover:text-sky-700 py-2 pl-10 transition duration-200"><a
                                href="#">Opción 2</a></li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>


                </nav>
            </aside>
            {{-- @else
                <p>No tienes una suscripción activa. <a href="{{ route('suscripciones') }}">Suscríbete</a></p>
            @endif --}}

            <main class=" w-full shadow-xl">

                <div class="container mx-auto mt-5 px-2">
                    <h2 class="font-black text-center text-3xl mb-10">
                        @yield('titulo')
                    </h2>
                    @yield('contenido')
                </div>
            </main>


        </div>


        <script>
            function toggleSubMenu(link) {
                const submenu = link.nextElementSibling; // Encuentra el siguiente elemento (el ul)
                submenu.classList.toggle('hidden');
            }
        </script>
    @endauth
</body>





</html>
