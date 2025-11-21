@extends('layout')

@section('content')
<main class="w-11/12 mx-auto">

    @if(session('success'))
    <div class="mt-3 bg-green-300 py-2 border border-green-700 text-green-700 font-semibold rounded">
        <p class="text-center">{{session('success')}}</p>
    </div>
    @endif

    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="mt-3 bg-red-300 py-2 border border-red-700 text-red-700 font-semibold rounded">
        <p class="text-center">{{$error}}</p>
    </div>
    @endforeach
    @endif

    <div class="flex justify-between items-center my-6">
        <a href="{{ route('dashboard') }}" class="bg-orange-400 hover:bg-orange-500 transition duration-500 px-5 py-3 rounded text-white font-semibold">
            <i class="ri-arrow-left-line"></i> Regresar al inicio
        </a>
        <h1 class="text-3xl font-bold text-blue-700">Listado de lotes</h1>
        <a href="{{ route('lots.create') }}" class="bg-blue-600 text-white font-semibold px-5 py-3 rounded hover:bg-blue-700 transition duration-500">
            + Agregar Lote
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Dirección</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lots as $lot)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $lot->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $lot->address }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('lots.edit', $lot) }}" class="text-blue-600 hover:text-blue-900 mr-3">Editar</a>
                        
                        <form action="{{ route('lots.destroy', $lot) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p class="font-semibold mb-2">No hay registros actualmente</p>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $lots->links() }} </div>
    </div>
</main>

@endsection