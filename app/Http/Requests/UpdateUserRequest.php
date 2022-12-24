<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'email|required|',
            'password' => 'required|min:6',
            'role' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'email.required' => 'Mohon isi Email terlebih dahulu',
            'email.email' => 'Email Harus Berupa Email',
            'password.required' => 'Mohon isi Password terlebih dahulu',
            'password.min' => 'Password minimal 6 karakter',
            'role.required' => 'Role Kosong',
        ];
    }
}
