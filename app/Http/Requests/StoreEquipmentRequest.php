<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'campus_id' => 'required',
            'area_id' => 'required',
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
            'observacion' => 'max:255',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'campus_id.required' => 'La sede es requerida.',
            'area_id.required' => 'El área es requerida.',
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
            'observacion.max' => 'el maximo de caracteres son 255.',
            'user_id.required' => 'El suaurio es requerido.',
        ];
    }
}
