<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'nombre' => 'required|min:4|max:20|unique:productos,nombre',
            'descripcion' => 'required|min:20|max:100',
            'precio' => 'required|min:4|max:6',
            'stock' => 'required|max:2',
            'descuento' => 'required|max:2',
            'imagen' => 'required'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre del producto',
            'nombre.min' => 'Debe contener al menos 3 letras',
            'nombre.max' => 'Debe contener cómo máximo 20 letras',
            'nombre.unique' => 'Producto :input ya existente',

            'descripcion.required' => 'Escriba una descripción',
            'descripcion.min' => 'La descripción debe contener al menos 20 cáracteres',
            'descripcion.max' => 'La descripcion debe tener como máximo 200 cáracteres',

            'precio.required' => 'Escriba un precio',
            'precio.min' => 'La cifra minima es 1000',
            'precio.max' => 'La cifra máxima es 999999',
            
            'stock.required' => 'Escriba el stock',
            'stock.max' => 'El stock máximo es 99',
            
            'descuento.required' => 'Escriba un descuento',
            'descuento.max' => 'El descuento máximo es de 99%',

            'imagen.required' => 'Ingrese una imagen'
        ];
    }
}
