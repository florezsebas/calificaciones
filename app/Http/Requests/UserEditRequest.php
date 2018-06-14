<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'codigo'     => 'min:6|max:50|required',
            'nombres'    => 'min:3|max:120|required|string',
            'apellidos'  => 'min:3|max:120|required|string',
            'email'      => 'required|string|email|max:255',
        ];
    }
}
