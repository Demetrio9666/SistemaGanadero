<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as Validacion;
class StoreFile_animale extends FormRequest
{



    public function __construct(Validacion $validacion)
    {
        $validacion->extend(
            'Vhembra',
            function($attribute,$value,$parameters){
                if($attribute == ""){

                }

                return false;
            }
        );
    }
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
            
                'codigo_animal'=>'required|unique:file_animale,animalCode,id',
                'file'=>'required|image|max:2048',
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
