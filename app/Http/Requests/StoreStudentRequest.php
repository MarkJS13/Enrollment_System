<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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


        return [
            'student_name' => 'required|string',
            'student_no' => 'required|integer|unique:students,student_no,' . $this->student,
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'address' => 'required|string'
        ];
    }
}
