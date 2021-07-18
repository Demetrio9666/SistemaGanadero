<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile_reproductionEX extends FormRequest
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

            
            'animalCode_id'=>'required',
            'race_id'=>'required',
            'age_month'=>'required'|'numeric',
            'animalCode_Exte'=>'required',
            'race_id'=>'required',
            'sex'=>'required',
            'hacienda_name'=>'required',


        ];
    }
}
