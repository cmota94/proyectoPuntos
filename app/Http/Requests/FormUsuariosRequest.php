<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUsuariosRequest extends FormRequest
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
            'usu_nombre' => 'required|max:30',
            'usu_apellidopaterno' => 'required|max:20|alpha',
            'usu_apellidomaterno' => 'required|max:20|alpha',
            'usu_estatus' => 'required|max:10|alpha',
            'email' => 'string|max:50'

        ];
    }
}
