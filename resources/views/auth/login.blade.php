<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ProyectoERP - @yield('titulo')</title>
    @vite('resources/css/app.css')



</head>

<body class="bg-white">
    <header class="p-5 bg-gradient-to-b from-sky-800 to-sky-600 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black ">
                ProyectoERP
            </h1>
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase  text-sm" href="{{ route('register') }}">Crea tu Cuenta</a>

            </nav>
        </div>
    </header>


    <main class="flex">
        <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
            <h2 class="font-black text-center text-3xl mb-10 p-5">
                Inicia Sesión
            </h2>

            <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
                <div class="md:w-4/12 p-5">
                    <img src="{{ asset('img/erp_2.jpg') }}" alt="Imagen registro de usuarios">
                </div>

                <div class="md:w-4/12 p-6 bg-white rounded-lg shadow-xl">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        @if (session('mensaje'))
                            <p class= "text-red-500 text-center">
                                {{ session('mensaje') }}
                            </p>
                        @endif

                        <div class="mb-5">
                            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                                Email
                            </label>
                            <input id="email" name="email" type="email" placeholder="Tu Email de registro"
                                class="border p-3 w-full rounded-lg @error('email')  border-red-500 @enderror"
                                value="{{ old('email') }}" />
                            @error('email')
                                <p class= "text-red-500 text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                                Password
                            </label>
                            <input id="password" name="password" type="password" placeholder="Password de registro"
                                class="border p-3 w-full rounded-lg @error('password')  border-red-500 @enderror" />
                            @error('password')
                                <p class= "text-red-500 text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <input type="submit" value="Iniciar sesion"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />

                    </form>

                </div>
            </div>
        </div>
    </main>
</body>

</html>
