<?php

namespace App\Http\Requests\Sales;

use App\Http\Requests\Request;



class CustomerRequest extends Request
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
            'nombre'               =>  'max:50',
            'apellido_paterno'     =>  'max:50',
            'apellido_materno'     =>  'max:50',
            'razon_social'         =>  'max:50',
            'ruc'                  =>  'max:11',            
            'nro_documento'        =>  'max:15',
            'porcentaje_descuento' =>  'max:100',
            'plazo_credito'        =>  'max:200',                        
            /*
            'tiempo'               =>  'required|numeric|max:200|min:1',
            'fecha_inicio'         =>  'required|date|before:fecha_fin|after:yesterday',
            'fecha_fin'            =>  'required|date|after:fecha_inicio',
            */
        ];
    }
}
