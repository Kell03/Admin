<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChofereFormRequest extends FormRequest
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
            
        'names'=>'required|max:255',
        'apellido'=>'required|max:255',
        'cedula'=>'required|max:255',
        'placas'=>'required|max:255',
        'tlf'=>'required|max:255',

        ];
    }
}
