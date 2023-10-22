<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ProyectoERP - @yield('titulo')</title>
    @vite('resources/css/app.css')



</head>

<body class="">

    <header class="p-5 bg-gradient-to-b from-sky-800 to-sky-600 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                ProyectoERP
            </h1>
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-sm" href="{{ route('login') }}">¿Ya tienes cuenta?
                    Inicia Sesión</a>

            </nav>
        </div>
    </header>


    <main class="flex">
        <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
            <h2 class="font-black text-center text-3xl mb-10">
                Registrate
            </h2>
            <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
                <div class="md:w-6/12 ">
                    <img src="{{ asset('img/erp_1.jpg') }}" alt="Imagen registro de usuarios">
                </div>

                <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="ci" class="mb-2 block uppercase text-gray-500 font-bold">
                                Ci
                            </label>
                            <input id="ci" name="ci" type="number" placeholder="cedula de identidad"
                                class="border p-3 w-full rounded-lg @error('ci') border-red-500 @enderror"
                                value="{{ old('ci') }}" />
                        </div>
                        @error('ci')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}
                            </p>
                        @enderror
                        <div class="mb-5">
                            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                                Nombre
                            </label>
                            <input id="name" name="name" type="text" placeholder="nombre"
                                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}" />
                        </div>
                        @error('name')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}
                            </p>
                        @enderror
                        <div class="mb-5">
                            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                                Username
                            </label>
                            <input id="username" name="username" type="text" placeholder="usuario"
                                class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" />
                        </div>
                        @error('username')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}
                            </p>
                        @enderror
                        <div class="mb-5">
                            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                                Email
                            </label>
                            <input id="email" name="email" type="email" placeholder="email de registro"
                                class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" />
                        </div>
                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}
                            </p>
                        @enderror
                        <div class="mb-5">
                            <label for="telefono" class="mb-2 block uppercase text-gray-500 font-bold">
                                Telefono
                            </label>
                            <input id="telefono" name="telefono" type="number" placeholder="telefono"
                                class="border p-3 w-full rounded-lg @error('telefono') border-red-500 @enderror" />
                        </div>
                        @error('telefono')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}
                            </p>
                        @enderror

                        <div class="mb-5">
                            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                                Password
                            </label>
                            <input id="password" name="password" type="password" placeholder="password"
                                class="border p-3 w-full rounded-lg" />
                        </div>
                        @error('password')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}
                            </p>
                        @enderror
                        <div class="mb-5">
                            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                                Repetir Password
                            </label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                placeholder="repite tu password" class="border p-3 w-full rounded-lg" />
                        </div>
                        <input value="Crear Cuenta" type="submit"
                            class="bg-sky-600 text-center hover:bg-sky-700 transition-colors cursor-pointer 
                            uppercase font-bold w-full p-3 text-white rounded-lg" />
                    </form>
                </div>
            </div>
        </div>





    </main>



    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Todos los derechos reservados
        {{ now()->year }}
    </footer>



</body>

</html>
