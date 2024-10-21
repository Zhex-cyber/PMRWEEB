<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required',
            'nis'               => 'required|numeric|unique:users,nis',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password',
            'whatsapp'          => 'required|numeric|unique:data_murids',
            'asal_jurusan'      => 'required',
            'alasan_masuk'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Nama Lengkap tidak boleh kosong.',
            'nis.required'              => 'NIS tidak boleh kosong.',
            'nis.numeric'               => 'NIS harus berupa angka.',
            'nis.unique'                => 'NIS sudah pernah digunakan.',
            'password.required'         => 'Password tidak boleh kosong.',
            'confirm_password.required' => 'Konfirmasi Password tidak sesuai.',
            'whatsapp.required'         => 'Nomor WhatsApp tidak boleh kosong.',
            'whatsapp.numeric'          => 'Nomor WhatsApp tidak valid.',
            'whatsapp.unique'           => 'Nomor WhatsApp sudah pernah digunakan.',
            'asal_jurusan.required'     => 'Asal Jurusan tidak boleh kosong.',
            'alasan_masuk.required'     => 'Alasan Masuk tidak boleh kosong.'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
