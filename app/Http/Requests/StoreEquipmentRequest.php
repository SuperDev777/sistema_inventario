<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
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
            'sede' => 'required',
            'area' => 'required',
            'piso' => 'required',
            'codigo' => 'required',
            'tipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'numserie' => 'required',
            'mac' => 'required',
            'procesador' => 'required',
            'ram' => 'required',
            'tipodisco' => 'required',
            'capacidaddisco' => 'required',
            'sistemaoperativo' => 'required',
            'adquisicion' => 'required',
            'stock' => 'required',
            'observacion' => 'required',
            'users_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sede.required' => 'La sede es requerida.',
            'area.required' => 'El área es requerida.',
            'piso.required' => 'El piso es requerido.',
            'codigo.required' => 'El código es requerido.',
            'tipo.required' => 'El tipo es requerido.',
            'marca.required' => 'La marca es requerida.',
            'modelo.required' => 'El modelo es requerido.',
            'numserie.required' => 'El número de serie es requerido.',
            'mac.required' => 'La MAC es requerida.',
            'procesador.required' => 'El procesador es requerido.',
            'ram.required' => 'La RAM es requerida.',
            'tipodisco.required' => 'El tipo de disco es requerido.',
            'capacidaddisco.required' => 'La capacidad de disco es requerida.',
            'sistemaoperativo.required' => 'El sistema operativo es requerido.',
            'adquisicion.required' => 'La adquisición es requerida',
            'stock.required' => 'El stock es requerido',
            'observacion.required' => 'La observación es requerida.',
            'users_id.required' => 'El suaurio es requerido.',
        ];
    }
}