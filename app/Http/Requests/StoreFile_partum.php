<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile_partum extends FormRequest
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
                'animalCode_id'=>'required',
                'male'=>'required|numeric',
                'female'=>'required|numeric',
                'dead'=>'required|numeric',
                'mother_status'=>'required',
                'partum_type'=>'required',
                

        ];
    }
}
