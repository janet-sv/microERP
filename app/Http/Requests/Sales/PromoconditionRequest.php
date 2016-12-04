<?php

namespace App\Http\Requests\Sales;

use App\Http\Requests\Request;



class PromoconditionRequest extends Request
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
            'nombre'               =>  'required|max:50',
            'descripcion'          =>  'required|max:150',
            'cantidad_requerida'   =>  'required|numeric|max:999|min:1',
            'cantidad_descuento'   =>  'numeric|max:100|min:0',
            'porcentaje_descuento' =>  'numeric|max:100|min:0',
            /*
            'tiempo'               =>  'required|numeric|max:200|min:1',
            'fecha_inicio'         =>  'required|date|before:fecha_fin|after:yesterday',
            'fecha_fin'            =>  'required|date|after:fecha_inicio',
            */
        ];
    }
}
