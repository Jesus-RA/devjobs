<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|min:8',
            'categoria_id' => 'required',
            'experiencia_id' => 'required',
            'ubicacion_id' => 'required',
            'salario_id' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required', 
        ];
    }
}
