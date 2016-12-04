<?php

namespace App\Http\Requests\Logistic;

use App\Http\Requests\Request;

class SectionRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'      => 'regex:/^[a-z\d\-_\s]+$/i|required|max:50',
            'warehouse' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.regex'  => 'El nombre solo puede contener números y/o letras',
            'name.max'  => 'El nombre no debe tener mas de 50 caracteres',
            'warehouse.required' => 'Debe seleccionar un almacén'
        ];
    }
}