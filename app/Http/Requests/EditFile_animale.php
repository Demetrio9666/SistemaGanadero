<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditFile_animale extends FormRequest
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
           
            
            'fecha_nacimiento'=>'required',
            'raza'=>'required',
            'sexo'=>'required',
            'etapa'=>'required',
            'origen'=>'required',
            'edad'=>'required|numeric',
            'estado_de_salud'=>'required',
            'estado_de_gestacion'=>'required',
            'localizacion'=>'required',
            'concebido'=>'required',
        ];
    }
}
