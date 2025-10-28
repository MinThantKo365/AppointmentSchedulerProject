<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePwdRequest extends FormRequest
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
            'cur_password' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'password_confirmation.same' => 'Password and confirm password are not match',
            'password_confirmation.required' => 'The confirm password field is required',
             'cur_password.required' => 'The current password field is required',
        ];
    }
}
