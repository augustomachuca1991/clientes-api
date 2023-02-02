<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ClientStoreRequest extends FormRequest
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
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fechaDeNacimiento' => 'date',
            'cuit' => 'required|numeric|digits:11|unique:clients,cuit',
            'domicilio' => 'max:50|nullable|regex:/^[A-Z,a-z][A-Z,a-z,0-9, ]+$/',
            'telefono' => 'required|digits:10|numeric',
            'email' => 'required|email:rfc|unique:clients,email',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            Log::channel('daily')->info($validator->errors());
        }
    }
}
