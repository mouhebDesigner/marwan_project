<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'string', 'max:255', 'alpha'],
            'prenom' => ['required', 'string', 'max:255', 'alpha'],
            'numtel' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'date_naissance' => ['required'],
            "formation" => "required",
            "adresse" => "required",
            "password" => "required | string | min:8 | confirmed"
        ];
    }
}
