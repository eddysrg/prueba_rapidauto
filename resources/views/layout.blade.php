<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Panel principal')</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet"/>
    @vite('resources/css/app.css')
    
</head>
<body class="bg-zinc-100">
    <header class="py-6 px-5 flex justify-between items-center shadow-md bg-white">
        <h1 class="text-center text-zinc-700 font-semibold">Bienvenido al gestor de lotes y vendedores {{Auth::user()->name}}</h1>
    
        <div class="flex justify-center">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="text-red-500 font-semibold cursor-pointer text-sm">Cerrar sesión</button>
            </form>
        </div>
    </header>
    @yield('content')
</body>
</html>