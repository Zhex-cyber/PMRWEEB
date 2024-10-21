<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSettingsRequest extends FormRequest
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
            'name'          => ['required'],
            'username'      => ['required'],
            'nis'           => ['required','numeric'],
            'foto_profile' => ['image', 'mimes:jpg,jpeg,png', 'max:2048']

        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama tidak boleh kosong.',
            'username.required'     => 'Username tidak boleh kosong.',
            'email.required'        => 'Email tidak boleh kosong.',
            'email.numeric'           => 'Email yang dimasukan tidak valid.',
            'foto_profile.image'    => 'Foto Profile yang dimasukan tidak valid.',
            'foto_profile.max'      => 'Maksimal ukuran Foto Profile 1MB.'
        ];
    }
}
