<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
            'id' => 'required',
            'sede' => 'required',
            'codigo' => 'required',
            'tipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'numserie' => 'required',
            'mac' => 'required',
            'procesador' => 'required',
            'ram' => 'required',
            'capacidaddisco' => 'required',
            'sistemaoperativo' => 'required',
            'observacion' => 'max:255',
            'users_id' => 'required',
        ];
    }
}
