<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
            'category_id' => [
                'required',
                'exists:categorires,id'
            ]
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'Se necesita un titulo para el sevicio',
            'category_id.required' => 'Seleccione una categoria para el servicio',
            'descripcion.required' => 'Ingresa una descripcion, es necesaria'


        ];
    }
}
