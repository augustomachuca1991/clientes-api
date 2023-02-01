<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombres' => ['required','max:255'],
            'apellidos' => ['required','max:255'],
            'fechaDeNacimiento' => ['date'],
            'cuit' => ['required','digits_between:10,11', 'unique:clients,cuit'],
            'telefono' => ['required'],
            'email' => ['required','email:rfc','unique:clients,email'],
        ];
    }
}
