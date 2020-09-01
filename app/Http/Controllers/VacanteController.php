<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\VacanteRequest;

class VacanteController extends Controller
{

    public function __construct()
    {
        // User must have been authenticated and verified
        $this->middleware(['auth', 'verified'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->simplePaginate(10);
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        $skills = Skill::all(['id', 'nombre']);
        return view('vacantes.create', compact('categorias', 'experiencias', 'ubicaciones', 'salarios', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacanteRequest $request)
    {
        auth()
            ->user()
            ->vacantes()
            ->create($request->all());

        return redirect()->route('vacantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {

        $this->authorize('view', $vacante);

        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        $skills = Skill::all(['id', 'nombre']);
        return view('vacantes.edit', compact('vacante','categorias', 'experiencias', 'ubicaciones', 'salarios', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(VacanteRequest $request, Vacante $vacante)
    {
        $this->authorize('update', $vacante);

        $vacante->fill($request->all());
        $vacante->save();

        return redirect()->route('vacantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {

        $this->authorize('delete', $vacante);

        $vacante->candidatos()->delete();
        $vacante->delete();
        
        return response()->json(['mensaje' => "Se eliminó la vacante" . $vacante->titulo]);
    }

    public function imagen(Request $request){
        $image = $request->file('file');
        $nameImage = 'vacantes/'.time() . '.' . $image->extension() ;
        $image->move( public_path( 'storage/vacantes/'), $nameImage);

        return response()->json(['correcto' => $nameImage]);
    }

    public function borrarimagen(Request $request){
        if($request->ajax()){
            $image =  $request->imagen;

            if( File::exists('storage/vacantes/'. $image) ){
                File::delete('storage/vacantes/'. $image);
                return response('Imagen eliminada', 200);
            }

            return response('No se encontró la imagen');
        }
    }

    // Cambia estado de una vacante
    public function estado(Request $request, Vacante $vacante){

        // Leer nuevo estado y guardarlo en la base de datos
        $vacante->activa = $request->estado;
        $vacante->save();

        return response()->json(['response' => 'Correcto']);

    }
}
