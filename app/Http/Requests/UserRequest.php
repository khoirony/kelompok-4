<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'email|required|unique:users',
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
            'email.unique.users' => 'Email sudah digunakan',
            'password.required' => 'Mohon isi Password terlebih dahulu',
            'password.min:6' => 'Password minimal 6 karakter',
            'role.required' => 'Role Kosong',
        ];
    }
}
