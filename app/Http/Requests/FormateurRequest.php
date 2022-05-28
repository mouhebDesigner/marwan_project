<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormateurRequest extends FormRequest
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
            'nom' => ['required', 'string', 'max:255', 'alpha'],
            'prenom' => ['required', 'string', 'max:255', 'alpha'],
            'numtel' => ['required', 'numeric', 'digits:8'],
            'date_naissance' => ['required'],
            "specialite" => "required",
            "adresse" => "required",
            "password" => "required | string | min:8 | confirmed"
        ];
    }
}
