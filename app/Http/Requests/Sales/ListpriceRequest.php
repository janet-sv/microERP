<?php

namespace App\Http\Requests\Sales;

use App\Http\Requests\Request;



class ListpriceRequest extends Request
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
            'precio' =>  'required|numeric|max:999999',            
            /*
            'tiempo'               =>  'required|numeric|max:200|min:1',
            'fecha_inicio'         =>  'required|date|before:fecha_fin|after:yesterday',
            'fecha_fin'            =>  'required|date|after:fecha_inicio',
            */
        ];
    }
}
