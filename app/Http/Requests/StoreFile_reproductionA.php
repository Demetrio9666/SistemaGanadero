<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile_reproductionA extends FormRequest
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
            'date'=>'required',
            //'animalCode_id_m' =>'required|unique:file_reproduction_artificial,animalCode_id_m,id',
            'animalCode_id_m'=>'required',
            'artificial_id' =>'required',
           
        
        ];
    }
}
