@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10">{{ $vacante->titulo }}</h1>
    <div class="mt-10 mb-10 md:flex items-start">
        <div class="md:w-3/5">

            <p class="block text-gray-700 font-bold my-2">
                Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Categoría: <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal">{{ $vacante->salario->nombre }}</span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Ubicación: <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
            </p>

            <h2 class="text-2xl text-center text-gray-700 mb-5">Conocimientos y Tecnologías</h2>

            @php
                $arraySkills = explode(',', $vacante->skills);
            @endphp
            @foreach ($arraySkills as $skill)
                <p class="inline-block border border-gray-400 rounded py-2 px-8 text-gray-700 my-2">
                    {{ $skill }}
                </p>
            @endforeach

            <img src="{{ Storage::url($vacante->imagen) }}" alt="" class="w-40 mt-10">

            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>

        </div>

        <aside class="md:w-2/5">
            2
        </aside>
    </div>
    
@endsection