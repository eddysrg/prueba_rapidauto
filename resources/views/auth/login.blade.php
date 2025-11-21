@extends('formLayout')

@section('title', 'Inicio de sesión')

@section('content')
<h1 class="text-3xl text-blue-700">Bienvenido(a)</h1>
<p class="text-sm text-zinc-600">Por favor inicie sesión</p>
<form action="{{route('login')}}" method="POST" class="space-y-5 mt-5">
    @csrf
    <div class="flex flex-col">
        <label for="email" class="text-sm text-zinc-800 font-semibold">Correo</label>
        <input type="text" id="email" name="email" class="border border-zinc-300 rounded-sm py-1 px-2" autocomplete="email">
        @error('email')
            <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
        @enderror
    </div>

    <div class="flex flex-col">
        <label for="password" class="text-sm text-zinc-800 font-semibold">Contraseña</label>
        <input type="password" id="password" name="password" class="border border-zinc-300 rounded-sm py-1 px-2">
        @error('password')
            <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
        @enderror
    </div>

    <div>
        <button class="bg-blue-500 w-full py-2 rounded text-white font-semibold">Iniciar sesión</button>
    </div>

    <p class="text-xs">¿No tiene una cuenta? <a href="{{route('register')}}" class="font-semibold text-blue-800">Regístrese</a> </p>

</form>
@endsection

