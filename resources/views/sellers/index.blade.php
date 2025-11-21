@extends('layout')

@section('content')
<main class="w-11/12 mx-auto">
    <div class="flex justify-between items-center my-6">
        <a href="{{route('dashboard')}}" class="bg-orange-400 hover:bg-orange-500 transition duration-500 px-5 py-3 rounded text-white font-semibold"><i class="ri-arrow-left-line"></i> Regresar al inicio</a>
        <h1 class="text-3xl font-bold text-blue-700">Vendedores</h1>
        <a href="{{ route('sellers.import') }}" class="bg-blue-600 text-white font-semibold px-5 py-3 rounded hover:bg-blue-700 transition duration-500">
            <i class="ri-import-line"></i> Importar Vendedores
        </a>
    </div>

    @if(session('success'))
    <div class="py-3 mb-4 bg-green-200 text-green-700 border border-green-700 rounded font-semibold flex justify-center">{{session('success')}}</div>
    @endif
    
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Lote Asignado</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-sky-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sellers as $seller)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-medium">{{ $seller->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-500">{{ $seller->email }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">
                            {{ $seller->lot->name }}
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-400">
                        <a href="{{route('sellers.edit', $seller)}}" class="text-blue-600 hover:text-blue-900 mr-3">Editar</a>
                        
                        <form action="{{route('sellers.destroy', $seller)}}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $sellers->links() }}
        </div>
    </div>
</main>
@endsection