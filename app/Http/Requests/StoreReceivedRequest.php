<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceivedRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

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