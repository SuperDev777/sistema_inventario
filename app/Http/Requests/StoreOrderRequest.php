<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'area_id' => 'required',
            'jefeinmediato' => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'area_id.required' => 'El área es es requerida.',
            'jefeinmediato.required' => 'El jefe inmediato es requerido.',
            'user_id.required' => 'El usuario es requerido',
        ];
    }
}
