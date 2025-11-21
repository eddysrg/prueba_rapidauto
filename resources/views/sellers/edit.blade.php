@extends('layout')

@section('content')
<main class="w-11/12 mx-auto">
    <div class="flex justify-between items-center my-6">
        <a href="{{route('sellers.index')}}" class="bg-orange-400 hover:bg-orange-500 transition duration-500 px-5 py-3 rounded text-white font-semibold"><i class="ri-arrow-left-line"></i> Regresar al listado de vendedores</a>
        <h1 class="text-3xl font-bold text-blue-700">Editar Vendedor</h1>
    </div>

    <div class="bg-white p-8 rounded shadow">
        <form action="{{{route('sellers.update', $seller)}}}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <label for="name" class="text-sm text-zinc-800 font-semibold">Nombre del vendedor</label>
                <input type="text" id="name" name="name" class="border border-zinc-300 rounded-sm py-1 px-2" value="{{old('name', $seller->name)}}">
                @error('name')
                    <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="email" class="text-sm text-zinc-800 font-semibold">Email</label>
                <input type="text" id="email" name="email" class="border border-zinc-300 rounded-sm py-1 px-2" value="{{old('email', $seller->email)}}">
                @error('email')
                    <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="lot_id" class="text-sm text-zinc-800 font-semibold">Lote</label>
                <select name="lot_id" id="lot_id" required class="border border-zinc-300 rounded-sm py-2 px-2">
                    @foreach($lots as $lot)
                    <option value="{{$lot->id}}"
                        {{old('lot_id', $seller->lot_id == $lot->id ? 'selected' : '')}}>
                        {{$lot->name}}
                    </option>
                    @endforeach
                </select>
                @error('lot_id')
                    <span class="text-sm text-red-700 font-semibold mt-1">{{$message}}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 transition duration-500 text-white font-semibold p-4 rounded text-sm cursor-pointer">Actualizar</button>
            </div>
        </form>
    </div>
    
</main>
@endsection