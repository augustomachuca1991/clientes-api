<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ClientUpdateRequest extends FormRequest
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
            'nombres' => ['required','max:255'],
            'apellidos' => ['required','max:255'],
            'fechaDeNacimiento' => ['date'],
            'cuit' => ['required','digits:11','numeric', Rule::unique('clients')->ignore($this->id)],
            'domicilio' =>['nullable', 'max:50', 'regex:/^[A-Z,a-z][A-Z,a-z,0-9, ]+$/'],
            'telefono' => ['required', 'numeric' , 'digits:10'],
            'email' => ['required','email:rfc',Rule::unique('clients')->ignore($this->id)],
        ];
    }


    public function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            Log::channel('daily')->info($validator->errors());
        }
    }
}
