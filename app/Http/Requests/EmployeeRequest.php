<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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

        if ($this->isMethod('put')) { // Only on create (POST method)
            return [
                'name' => ['required', 'string', 'max:255', ],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->employee)],
                'mobile' => ['required', 'numeric', Rule::unique('users', 'mobile_number')->ignore($this->employee)],
                'address' => ['required', 'string', 'max:200'],
                'gender' => ['required', 'string', 'max:10'],
                'position' => ['required', 'numeric'],
                'department' => ['required', 'numeric'],
                'admin' => ['required', 'boolean'],
            ];
        }

        return [
            'name' => ['required', 'string', 'max:255', ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->employee)],
            'mobile' => ['required', 'numeric', Rule::unique('users', 'mobile_number')->ignore($this->employee)],
            'address' => ['required', 'string', 'max:200'],
            'gender' => ['required', 'string', 'max:10'],
            'position' => ['required', 'numeric'],
            'department' => ['required', 'numeric'],
            'password' => ['required', 'confirmed', 'min:6'],
            'admin' => ['required', 'boolean'],
        ];
    }
}
