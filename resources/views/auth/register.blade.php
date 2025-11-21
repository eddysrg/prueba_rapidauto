@extends('formLayout')

@section('title', 'Formulario de registro')

@section('content')

<h1 class="text-3xl text-blue-700">Regístrese</h1>
<p class="text-sm text-zinc-600">Para poder acceder ingrese correctamente sus datos</p>

<form action="{{route('register')}}" method="POST" class="space-y-5 mt-5">
    @csrf
    <div class="flex flex-col">
        <label for="name" class="text-sm text-zinc-800 font-semibold">Nombre</label>
        <input type="text" name="name" id="name" class="border border-zinc-300 rounded-sm py-1 px-2">
        @error('name')
            <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
        @enderror
    </div>

    <div class="flex flex-col">
        <label for="email" class="text-sm text-zinc-800 font-semibold">Email</label>
        <input type="text" name="email" id="email" class="border border-zinc-300 rounded-sm py-1 px-2">
        @error('email')
            <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
        @enderror
    </div>

    <div class="flex flex-col">
        <label for="password" class="text-sm text-zinc-800 font-semibold">Contraseña</label>
        <input type="password" name="password" id="password" class="border border-zinc-300 rounded-sm py-1 px-2">
        @error('password')
            <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
        @enderror
    </div>

    <div class="flex flex-col">
        <label for="password_confirmation" class="text-sm text-zinc-800 font-semibold">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="border border-zinc-300 rounded-sm py-1 px-2">
    </div>

    <div>
        <button class="bg-blue-500 w-full py-2 rounded text-white font-semibold" type="submit">Registrar</button>
    </div>

    <p class="text-xs">¿Ya tiene una cuenta? <a href="{{route('login')}}" class="font-semibold text-blue-800">Inicie Sesión</a></p>
</form>
@endsection