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
        action="{{ route('vacantes.store') }}"
        method="POST"
        class="max-w-lg mx-auto my-10"
    >
        @csrf
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante: </label>

            <input
                id="titulo"
                type="text"
                placeholder="Titulo de la vacante"
                class="p-3 bg-gray-400 rounded form-input w-full @error('titulo') border-red-500 border @enderror"
                name="titulo"
                value="{{ old('titulo') }}"
                autofocus
            >

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="categoria_id" class="block text-gray-700 text-sm mb-2">Categoría: </label>

            <select
                name="categoria_id"
                id="categoria_id"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Categoría -- </option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>

            @error('categoria_id')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="experiencia_id" class="block text-gray-700 text-sm mb-2">Experiencia: </label>

            <select
                name="experiencia_id"
                id="experiencia_id"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Experiencia -- </option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{ $experiencia->id }}" {{ old('experiencia_id') == $experiencia->id ? 'selected' : '' }}>
                        {{ $experiencia->nombre }}
                    </option>
                @endforeach
            </select>

            @error('experiencia_id')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="ubicacion_id" class="block text-gray-700 text-sm mb-2">Ubicación: </label>

            <select
                name="ubicacion_id"
                id="ubicacion_id_id"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Ubicación -- </option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}" {{ old('ubicacion_id') == $ubicacion->id ? 'selected' : '' }}>
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach
            </select>

            @error('ubicacion_id')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="salario_id" class="block text-gray-700 text-sm mb-2">Salario: </label>

            <select
                name="salario_id"
                id="salario_id"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                        p-3 bg-gray-100"
            >
                <option disabled selected> -- Salario -- </option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}" {{ old('salario_id') == $salario->id ? 'selected' : '' }}>
                        {{ $salario->nombre }}
                    </option>
                @endforeach
            </select>

            @error('salario_id')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                Descripción del pueto: 
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700">{{ old('descripcion') }}</div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">

            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="dropzoneDevJobs" class="block text-gray-700 text-sm mb-2">
                Imagen vacante:
            </label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
            <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">
            <p id="error"></p>

            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="skill" class="block text-gray-700 text-sm mb-5">
                Habilidades y conocimientos: <span class="xs">(Elige al menos 3)</span>
            </label>            
            <lista-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode( old('skills') ) }}"
            ></lista-skills>
            @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 roundede relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
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
                        'orderedlist', 'unorderedlist', 'h2', 'h3'
                    ],
                    static: true,
                    sticky: true,
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            })

            // Saving in input hidden 'descripcion' what user types in medium-editor
            editor.subscribe('editableInput', function (eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            // Fill medium-editor with input hidden 'descripcion' content
            editor.setContent( document.querySelector('#descripcion').value );

            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Arrastra aquí tus imagenes aquí o da clic',
                acceptedFiles: ".png,.jpg,.jpeg,.git,.bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content,
                },
                init: function(){
                    if( document.querySelector('#imagen').value.trim() ){
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-success');
                        imagenPublicada.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file, response){
                    // Saving the image reference in image input
                    document.querySelector('#imagen').value = response.correcto;
                    document.querySelector('#error').textContent = "";

                    // Writing in file the name of image in server
                    file.imagenServidor = response.correcto;

                    file.previewElement.classList.add('dz-success');
                    file.previewElement.classList.add('dz-complete');
                },
                // error: function(file, response){
                //     document.querySelector('#error').textContent = "Formato no valido";
                // },
                maxfilesexceeded: function(file){
                    if( this.files[1] != null ){
                        this.removeFile(this.files[0]);//Elimina el archivo anterior
                        this.addFile(file);//Agrega el nuevo archivo
                    }
                },
                removedfile: function(file, response){

                    file.previewElement.parentNode.removeChild(file.previewElement);

                    const params = {
                        imagen : file.imagenServidor ?? document.querySelector('#imagen').value,
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then(response => console.log(response))
                },
            });
        })
    </script>
@endsection