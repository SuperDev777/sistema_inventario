<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGoodRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'codigo' => 'required',
            'tipo' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El código es requerido.',
            'tipo.required' => 'El tipo es requerido.',
            'marca.required' => 'La marca es requerida.',
            'descripcion.required' => 'La descripcion es requerida.',
            'stock.required' => 'El stock es requerido.',
            'user_id.required' => 'El usuario es requerido.'
        ];
    }
}
