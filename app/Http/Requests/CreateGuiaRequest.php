<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGuiaRequest extends FormRequest
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
            

            'guia'=>'required',
          'chofer'=>'required',
          'id_chofer'=>'required',
          'placa'=>'required',
          'dueño'=>'required',
          'origen'=>'required',
          'destino'=>'required',
          'carga'=>'required',
          'created_at'=>'required',
          'updated_at'=>'required',
          'status'=>'required',

        ];
    }
}
