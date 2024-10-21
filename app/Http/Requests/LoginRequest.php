<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nis'      => 'required|numeric|exists:users,nis',
            'password' => 'required'
        ];
    }

    /**
     * Get the validation messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nis.required'       => "NIS tidak boleh kosong.",
            'nis.numeric'        => "NIS harus berupa angka.",
            'nis.exists'         => "NIS tidak terdaftar pada sistem.",
            'password.required'  => "Password tidak boleh kosong.",
        ];
    }
}
