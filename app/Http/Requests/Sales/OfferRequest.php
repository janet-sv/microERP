<?php

namespace App\Http\Requests\Sales;

use App\Http\Requests\Request;



class OfferRequest extends Request
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
            'descripcion'          =>  'max:150',            
            'fecha_inicio'         =>  'required|date|before:fecha_fin',
            'fecha_fin'            =>  'required|date|after:fecha_inicio',
            /*
            'tiempo'               =>  'required|numeric|max:200|min:1',
            'fecha_inicio'         =>  'required|date|before:fecha_fin|after:yesterday',
            'fecha_fin'            =>  'required|date|after:fecha_inicio',
            */
        ];
    }
}
