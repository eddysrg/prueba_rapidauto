@extends('layout')

@section('content')
<main class="w-11/12 mx-auto">

    <div class="flex justify-between items-center my-6">
        <a href="{{route('lots.index')}}" class="bg-orange-400 hover:bg-orange-500 transition duration-500 px-5 py-3 rounded text-white font-semibold"><i class="ri-arrow-left-line"></i> Regresar al listado de lotes</a>
        <h1 class="text-3xl font-bold text-blue-700">Editar Lote</h1>
    </div>

    <div class="bg-white p-8 rounded shadow">
        <form action="{{route('lots.store')}}" method="POST" class="space-y-5">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-sm text-zinc-800 font-semibold">Nombre del local</label>
                <input type="text" id="name" name="name" class="border border-zinc-300 rounded-sm py-1 px-2">
                @error('name')
                    <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
                @enderror
            </div>
    
            <div class="flex flex-col">
                <label for="address" class="text-sm text-zinc-800 font-semibold">Dirección</label>
                <input type="text" id="address" name="address" class="border border-zinc-300 rounded-sm py-1 px-2">
                @error('address')
                    <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
                @enderror
            </div>
    
            <div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 transition duration-500 text-white font-semibold p-4 rounded text-sm cursor-pointer">Dar de alta Local</button>
            </div>
        </form>
    </div>

</main>
@endsection