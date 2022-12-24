<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AspirasiRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id_user' => 'required',
            'isi_aspirasi' => 'required',
            'status' => 'required',
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
            'id_user.required' => 'id_user tidak boleh kosong',
            'isi_aspirasi.required' => 'isi aspirasi ini tidak boleh kosong',
            'status.required' => 'status aspirasi ini tidak boleh kosong',
        ];
    }
}
