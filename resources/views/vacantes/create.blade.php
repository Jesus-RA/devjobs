@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

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
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoría Vacante: </label>

            <select
                name="categoria"
                id="categoria"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Categoría -- </option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>

            @error('categoria')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Categoría Vacante: </label>

            <select
                name="experiencia"
                id="experiencia"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Experiencia -- </option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{ $experiencia->id }}">
                        {{ $experiencia->nombre }}
                    </option>
                @endforeach
            </select>

            @error('experiencia')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Categoría Vacante: </label>

            <select
                name="ubicacion"
                id="ubicacion"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Ubicación -- </option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach
            </select>

            @error('ubicacion')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Categoría Vacante: </label>

            <select
                name="salario"
                id="salario"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Salario -- </option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">
                        {{ $salario->nombre }}
                    </option>
                @endforeach
            </select>

            @error('salario')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                Descripción del pueto: 
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                Imagen vacante:
            </label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>

    <script>

        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {
            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: [
                        'bold', 'italic', 'underline',
                        'quote', 'anchor', 'justifyLeft',
                        'justifyCenter', 'justifyRight', 'justifyFull',
                        'orderedList', 'unorderedList', 'h2', 'h3'
                    ],
                    static: true,
                    sticky: true,
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            })

            editor.subscribe('editableInput', function (eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen"
            });
        })
    </script>
@endsection