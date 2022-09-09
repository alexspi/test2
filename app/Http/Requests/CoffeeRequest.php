<?php

namespace App\Http\Requests;

use App\Rules\IsValidCatName;
use Illuminate\Foundation\Http\FormRequest;

class CoffeeRequest extends FormRequest
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
            'search' => ['alpha_dash'],
            'callories' => ['numeric','min:0'],
            'cats' => ['string',new IsValidCatName],

        ];
    }
}
