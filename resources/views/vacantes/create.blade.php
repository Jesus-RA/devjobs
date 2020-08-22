@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>
    <form 
        action=""
        class="max-w-lg mx-auto my-10"
    >
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante: </label>

            <input id="titulo" type="text" class="p-3 bg-gray-400 rounded form-input w-full @error('titulo') border-red-500 border @enderror" name="email" value="{{ old('titulo') }}" autofocus>

            @error('titulo')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-5">
            <button type="submit"
                class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
            >
                Publicar Vacante
            </button>
        </div>
    </form>
@endsection