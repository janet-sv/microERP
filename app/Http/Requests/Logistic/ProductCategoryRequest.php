<?php

namespace App\Http\Requests\Logistic;

use App\Http\Requests\Request;

class ProductCategoryRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'      => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'abrCode'   => 'regex:/^[\pL\s\-]+$/u|required|max:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.regex'  => 'El nombre no debe contener caracteres especiales',
            'abrCode.required'       => 'La abreviación es requerida',
            'abrCode.regex' => 'La abreviatur no debe contener caracteres especiales',
        ];
    }
}