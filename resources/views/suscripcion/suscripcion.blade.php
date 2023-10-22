<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <header class=" p-5 border-b bg-white shadow">
        <div class="mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                ProyectoERP
            </h1>


            <nav class="flex gap-2 items-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="font-bold uppercase text-gray-600 text-sm"
                        href="{{ route('logout') }}">
                        Cerrar Sesion
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <main>
        <div class="h-screen flex items-center justify-center">
            <div class="mx-auto p-6 bg-white shadow-md rounded-md">
                <h1 class="text-3xl text-center font-semibold mb-4">Opciones de Suscripción</h1>
    
                <div class="grid gap-6">
                    @foreach($suscripciones as $suscripcion)
                        <div class="border border-gray-300 p-4 rounded-md text-center">
                            <span class="text-2xl text-gray-700 font-semibold">{{ $suscripcion->nombre }}</span>
                            <span class="text-2xl text-gray-700 font-semibold">${{ $suscripcion->precio }}</span>
                            <form action="{{ route('procesar-pago') }}" method="POST">
                                @csrf
                                <input type="hidden" name="subscription_id" value="{{ $suscripcion->id }}">
                                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2">
                                    Pagar
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
    
                <div class="mt-6 text-gray-600 text-lg text-center">
                    <p>Al pagar, aceptas nuestros términos y condiciones.</p>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>