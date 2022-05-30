<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'lastname.required' => 'El apellido es requerido.',
            'email.required' => 'El email es requerido.',
            'password.required' => 'La contraseña es requerida.',
        ];
    }
}
