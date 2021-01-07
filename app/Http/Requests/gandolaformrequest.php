<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class gandolaformrequest extends FormRequest
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

         'propietario'=>'required|max:255',
        'marca'=>'required|max:255',
        'modelo'=>'required|max:255',
        'placa'=>'required|max:255',
        'descripcion'=>'required|max:255',
        'estado'=>'required|max:255',
        'created_at' => 'required',
        ];
    }
}
