<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdatecustomerRequest extends FormRequest
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
        $method = $this->method();
        
        if ($method == "PUT") {
            return [
                "name" => ["required"],
                "email" => ["required", "email"],
                "city" => ["required"],
                "state" => ["required"],
                "address" => ["required"],
                "postalCode" => ["required"],
                "type" => ["required", Rule::in(["I", "i", "B", "b"])]
            ];

        }else{
            return [
                "name" => ["sometimes","required"],
                "email" => ["sometimes","required", "email"],
                "city" => ["sometimes","required"],
                "state" => ["sometimes","required"],
                "address" => ["sometimes","required"],
                "postalCode" => ["sometimes","required"],
                "type" => ["sometimes","required", Rule::in(["I", "i", "B", "b"])]
            ];

        }

    }
    protected function prepareForValidation()
    {
        if ($this->postalCode) {
            $this->merge([
                'postal_code' => $this->postalCode

            ]);
        }
    }

}
