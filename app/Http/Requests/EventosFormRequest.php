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
            'act_fechaInicio' => 'required',
            'act_fechaFin' => 'required',
            'act_horaInicio' => 'required',
            'act_horaFin' => 'required',
            'act_numeroPuntos' => 'required|max:15|numeric',
            'rec_idRecinto' => 'required',
            'act_estatus' => 'required'
        ];
    }
}
