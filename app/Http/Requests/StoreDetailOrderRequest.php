<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailOrderRequest extends FormRequest
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
            'cantidad' => 'required',
            'unidadmedida' => 'required',
            'descripcion' => 'required',
            'order_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cantidad.required' => 'La cantidad es requerida.',
            'unidadmedida.required' => 'La unidad de miedida es requerida.',
            'descripcion.required' => 'La descripcion es requerida.',
        ];
    }
}
