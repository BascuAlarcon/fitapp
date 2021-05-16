<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:20|unique:categorias,nombre',
            'descripcion' => 'required|min:20|max:200|'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre de la categoria',
            'nombre.min' => 'Nombre muy corto. Debe contener al menos 3 carácteres',
            'nombre.max' => 'Nombre muy largo. Debe contener menos de 20 carácteres',
            'nombre.unique' => 'Categoria :input ya existente',

            'descripcion.required' => 'Indique una descripción',
            'descripcion.min' => 'Descripción muy corta. Debe contener al menos 20 carácteres',
            'descripcion.max' => 'Descripción muy larga. Debe contener menos de 200 carácteres'
        ];
    }
}
