@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-10">
    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <h2 class="text-xl font-bold text-blue-800">Importar Vendedores</h2>
    </div>

    <form action="{{ route('sellers.import') }}" method="POST" class="p-6">
        @csrf
        <div class="mb-6">
            <label for="lot_id" class="block text-gray-700 text-sm font-bold mb-2">
                Selecciona el Lote de Destino:
            </label>
            <p class="text-xs text-gray-500 mb-2">Todos los vendedores importados se asignarán a este lote.</p>

            @if(!$lots->count() > 0)
            <p class="text-sm font-semibold mb-2">No hay registros de lotes, porfavor crea uno <a href="{{route('lots.create')}}" class="text-blue-500">aquí</a> </p>
            @endif

            <select name="lot_id" id="lot_id" required
                class="block w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                <option value="">-- Selecciona un lote --</option>
                @foreach($lots as $lot)
                <option value="{{ $lot->id }}">{{ $lot->name }} ({{ $lot->address }})</option>
                @endforeach
            </select>
            @error('lot_id')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <a href="{{ route('sellers.index') }}" class="text-red-600 mr-6 font-semibold">Cancelar</a>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 transition duration-500 text-white font-semibold p-4 rounded text-sm cursor-pointer">
                Importar Datos
            </button>
        </div>
    </form>
</div>
@endsection