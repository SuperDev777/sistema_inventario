<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailReceivedRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cantidad' => 'required',
            'unidadmedida' => 'required',
            'descripcion' => 'required',
            'received_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cantidad.required' => 'La cantidad es requerida.',
            'unidadmedida.required' => 'La unidad de miedida es requerida.',
            'descripcion.required' => 'La descripcion es requerida.',
            'received_id.required' => 'La recpción es requerida'
        ];
    }
}
