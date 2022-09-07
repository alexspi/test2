<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'search' =>'required',
            'fats_min'=>'required',
            'fats_max'=>'required',
//            'coffe'=>'required',
//            'coffe_type'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'search.required' => 'A title is required',
            'coffe.required' => 'A message is required',
        ];
    }
}
