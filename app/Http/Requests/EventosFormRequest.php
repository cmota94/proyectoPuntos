<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosFormRequest extends FormRequest
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
            'act_nombre' => 'required|max:150',
            'act_responsable' => 'required|max:100',
            'act_fechainicio' => 'required',
            'act_fechafin' => 'required',
            'act_horainicio' => 'required',
            'act_horafin' => 'required',
            'act_numeropuntos' => 'required|max:15|numeric',
            'act_idlugar' => 'required',
            'act_estatus' => 'required'
        ];
    }
}
