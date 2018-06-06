<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'codigo'     => 'min:6|max:50|required|unique:docentes',
            'nombres'    => 'min:3|max:120|required|string',
            'apellidos'  => 'min:3|max:120|required|string',
            'email'      => 'required|string|email|max:255|unique:users',
            
        ];
    }
}
