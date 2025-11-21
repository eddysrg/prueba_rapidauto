@extends('layout')

@section('title', 'Panel principal')

@section('content')
<main class="p-8">
    <div class="mt-5 flex gap-3">
        <a href="{{route('lots.index')}}" class="w-90 h-40 bg-green-600 hover:bg-green-700 transition duration-500 text-xl text-white p-5 rounded flex justify-between">
            Ir a gestión de lotes
            <i class="ri-store-line text-4xl"></i>
        </a>
        <a href="{{route('sellers.index')}}" class="w-90 h-40 bg-yellow-600 hover:bg-yellow-700 transition duration-500 text-xl text-white p-3 rounded flex justify-between">
            Ir a gestión de vendedores
            <i class="ri-team-line text-4xl"></i>
        </a>
    </div>
</main>
@endsection