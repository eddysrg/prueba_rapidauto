<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login')</title>
    @vite('resources/css/app.css')
    
</head>
<body class="w-full h-dvh">
    <div class="w-full h-full flex justify-center items-center bg-gray-100">
        <div class="bg-white shadow-md p-10 rounded-xl w-96">
            @yield('content')
        </div>
    </div>
</body>
</html>