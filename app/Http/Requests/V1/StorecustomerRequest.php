<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorecustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>["required"],
            "email"=>["required","email"],
            "city"=>["required"],
            "state"=>["required"],
            "address"=>["required"],
            "postalCode"=>["required"],
            "type"=>["required", Rule::in(["I","i","B","b"])]
        ];

       
    }
     protected function prepareForValidation(){
        $this->merge([
            'postal_code'=>$this->postalCode
 
        ]);
        }

}
