<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            "name" => 'required',
            "email" => 'required|unique:users,email',
            "license_no" => 'required',
            "department" => 'required'
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['email'] = [
                'email',
                Rule::unique('students')->ignore($this->route('id')),
            ];
        }

        return $rules;
    }
}
